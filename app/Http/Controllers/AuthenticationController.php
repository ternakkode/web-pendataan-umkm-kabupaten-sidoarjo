<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login;
use App\Model\Admin;
use App\Model\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller {

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

        if (!$acess) return redirect()->back()->withErrors(['status', 'Username / Password tidak valid']);
        
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
