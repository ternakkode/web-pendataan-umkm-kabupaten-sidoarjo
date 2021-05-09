<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login;
use App\Http\Requests\Register;
use App\Mail\VerifikasiEmail;
use App\Model\Admin;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthenticationController extends Controller {

    public function appRegister() {
        return view('page/front/register');
    }

    public function processRegister(Register $request) {
        $input = $request->validated();

        $user = new User();
        $user->email = $input['email'];
        $user->username = $input['username'];
        $user->password = Hash::make($input['password']);
        $user->nama = $input['nama'];
        $user->kode_verifikasi = sha1(time());
        $user->save();

        Mail::to($user->email)->send(new VerifikasiEmail($user));
        $this->addSession('user', $user);

        return redirect('app/verification')->with('success_message', 'Anda berhasil mendaftarkan diri pada website kami, silahkan cek email anda untuk memverifikasi akun anda');
    }

    public function reminderVerificationEmail(Request $request) {
        $resendEmail = $request->query('resend');
        $payload = [];

        if ($resendEmail) {
            $userId = session('logged_in_id');
            if ($userId) {
                $user = User::find($userId);
                $user->kode_verifikasi = sha1(time());
                $user->save();

                Mail::to($user->email)->send(new VerifikasiEmail($user));
                $payload['message'] = [
                    'status' => true,
                    'message' => 'Berhasil mengirimkan kembali verifikasi email anda'
                ];
            } else {
                $payload['message'] = [
                    'status' => false,
                    'message' => 'User tidak ditemukan'
                ];
            }
        }

        return view('page/front/email_verification', $payload);
    }

    public function processVerification(Request $request) {
        $alreadyLoginBefore = session('is_logged_in');
        $kodeVerifikasi = $request->query('code');

        $user = User::where('kode_verifikasi', $kodeVerifikasi)->first();
        if (!$user) {
            return redirect('/')->with('failed_message', 'Kode verifikasi yang anda masukkan tidak valid');
        }

        if ($user->telah_terverifikasi) {
            return redirect('/')->with('success_message', 'Akun anda tleah terverifikasi, anda tidak perlu verifikasi ulang');
        }

        $user->telah_terverifikasi = true;
        $user->save();
        if (!$alreadyLoginBefore) {
            return redirect('/app/login')->with('success_message', 'Anda telah berhasil memverifikasi akun anda, silahkan login untuk melanjutkan');
        }
        
        $this->addSession('user', $user);
        return redirect('/app/profile/complete')->with('success_message', 'Selamat anda telah memverifikasi akun anda, sialhkan lengkapi profil anda');
    }

    public function appLogin() {
        return view('page/front/login');
    }

    public function backofficeLogin() {
        return view('page/backoffice/login');
    }

    public function processLogin(Login $request) {
        $input = $request->validated();

        $role = $input['role'];
        if ($role == 'admin') {
            $acess = $this->adminLogin($input['username'], $input['password']);
            $redirection = '/backoffice';
        } else if ($role == 'user') {
            $acess = $this->userLogin($input['username'], $input['password']);
            $redirection = '/app';
        }

        if (!$acess) return redirect()->back()->with('failed_message', 'Username / Password tidak valid');
        
        $this->addSession($role, $acess);

        return redirect($redirection)->with('success_message', 'Anda berhasil login sebagai '. $role);
    }

    private function userLogin($username, $password) {
        $user = User::where('username', $username)->first();
        if (!$user) return null;
        if (!Hash::check($password, $user->password)) return null;

        return $user;
    }

    private function adminLogin($username, $password) {
        $admin =  Admin::where('username', $username)->first();
        if (!$admin) return false;

        if (!Hash::check($password, $admin->password)) return false;

        return $admin;
    }

    private function addSession($role, $payload) {
        session([
            'is_logged_in' => true,
            'logged_in_id' => $payload->id,
            'role' => $role
        ]);

        if ($role == 'user') {
            session([
                'nama' => $payload->nama,
                'email' => $payload->email,
                'foto_profil' => $payload->foto_profil,
                'is_email_verified' => (bool) $payload->telah_terverifikasi,
                'is_profile_completed' => ($payload->no_hp && $payload->pendidikan_terakhir && $payload->foto_profil) ? true : false
            ]);
        }
    }

    public function logout() {
        session()->flush();
        return redirect('/')->with('success_message', 'Berhasil keluar dari akun anda');
    }
}
