<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompleteProfile;
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
    
    public function processComplete(CompleteProfile $request) {
        $input = $request->validated();
        $userId = session('logged_in_id');
        
        $fotoProfil = $input['foto_profil']->store('public/images/user/profile'); // TODO: handle file upload lebih proper
        
        $user = User::find($userId);
        $user->nama = $input['nama'];
        $user->nik = $input['nik'];
        $user->no_hp = $input['no_hp'];
        $user->pendidikan_terakhir = $input['pendidikan_terakhir'];
        $user->foto_profil = $fotoProfil;
        $user->save();
        $user->alamat()->create([
            'id_kecamatan' => $input['kecamatan'],
            'id_desa' => $input['desa'],
            'detail' => $input['detail_alamat']
        ]);

        return redirect('/app')->with('success_message', 'Profil anda telah lengkap, anda bisa mulai menambahkan UMKM anda'); // TODO: TAMBAHKAN HANDLING FLASH SESSION
    }
}
