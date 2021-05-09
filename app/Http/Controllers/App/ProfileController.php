<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompleteProfile;
use App\Http\Requests\EditProfile;
use App\Model\Desa;
use App\Model\Kecamatan;
use App\Model\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function complete() {
        $isProfileCompleted = (bool) session('is_profile_completed');
        if ($isProfileCompleted) return redirect('/app');

        $userId = session('logged_in_id');
        $payload['kecamatan'] = Kecamatan::with('desa')->get();
        $payload['user'] = User::find($userId);

        return view('page/user/profile/complete', $payload);
    }

    public function edit() {
        $userId = session('logged_in_id');
        $payload['user'] = User::find($userId);
        $payload['kecamatan'] = Kecamatan::with('desa')->get();
        $payload['desa'] = Desa::where('id_kecamatan', $payload['user']->alamat->id_kecamatan)->get();

        return view('page/user/profile/edit', $payload);
    }

    public function processEdit(EditProfile $request) {
        $input = $request->validated();
        $userId = session('logged_in_id');

        if (isset($input['foto_profil'])) {
            $fileName = uniqid() . '_' . trim($input['foto_profil']->getClientOriginalName());
            $input['foto_profil']->storeAs(config('url.profile'), $fileName);
        }
        
        $user = User::find($userId);
        $user->nama = $input['nama'];
        $user->nik = $input['nik'];
        $user->no_hp = $input['no_hp'];
        $user->pendidikan_terakhir = $input['pendidikan_terakhir'];
        $user->password = isset($input['password']) ? Hash::make($input['password']) : $user->password; 
        $user->foto_profil = isset($fileName) ? $fileName : $user->foto_profil;
        $user->save();
        $user->alamat()->update([
            'id_kecamatan' => $input['kecamatan'],
            'id_desa' => $input['desa'],
            'detail' => $input['detail_alamat']
        ]);

        session(['foto_profil' => $user->foto_profil]);
        return redirect('/app')->with('success_message', 'Profil anda berhasil diubah');
    }
    
    public function processComplete(CompleteProfile $request) {
        $input = $request->validated();
        $userId = session('logged_in_id');

        $fileName = uniqid() . '_' . trim($input['foto_profil']->getClientOriginalName());
        $input['foto_profil']->storeAs(config('url.profile'), $fileName);
        
        $user = User::find($userId);
        $user->nama = $input['nama'];
        $user->nik = $input['nik'];
        $user->no_hp = $input['no_hp'];
        $user->pendidikan_terakhir = $input['pendidikan_terakhir'];
        $user->foto_profil = $fileName;
        $user->save();
        $user->alamat()->create([
            'id_kecamatan' => $input['kecamatan'],
            'id_desa' => $input['desa'],
            'detail' => $input['detail_alamat']
        ]);

        session(['is_profile_completed' => true, 'foto_profil' => $user->foto_profil]);
        return redirect('/app')->with('success_message', 'Profil anda telah lengkap, anda bisa mulai menambahkan UMKM anda');
    }
}
