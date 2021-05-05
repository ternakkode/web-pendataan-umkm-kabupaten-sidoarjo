<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Model\Desa;
use App\Model\User;
use App\Model\Kecamatan;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $payload['user'] = User::all();

        return view('page/backoffice/user/index', $payload);
    }


    public function create()
    {
        $payload['kecamatan'] = Kecamatan::with('desa')->get();
        return view('page/backoffice/user/create', $payload);
    }


    public function store(CreateUser $request)
    {
        $input = $request->validated();
        
        $user = new User();
        $user->email = $input['email'];
        $user->username = $input['username'];
        $user->password = Hash::make($input['password']);
        $user->nama = $input['nama'];
        $user->nik = $input['nik'];
        $user->no_hp = $input['no_hp'];
        $user->pendidikan_terakhir = $input['pendidikan_terakhir'];

        $fileName = uniqid() . '_' . trim($input['foto_profil']->getClientOriginalName());
        $input['foto_profil']->storeAs(config('url.profile'), $fileName);
        $user->foto_profil = $fileName;

        $user->save();
        $user->alamat()->create([
            'id_kecamatan' => $input['kecamatan'],
            'id_desa' => $input['desa'],
            'detail' => $input['detail_alamat']
        ]);

        // TODO : kirim email ke user baru
        return redirect('backoffice/user')->with('success_message', 'Berhasil menambahkan User baru');
    }


    public function edit($id)
    {
        $payload['user'] = User::find($id);
        if (!$payload['user']) redirect('backoffice/user')->with('failed_message', 'Data User tidak ditemukan');
        $payload['kecamatan'] = Kecamatan::with('desa')->get();
        $payload['desa'] = Desa::where('id_kecamatan', $payload['user']->alamat->id_kecamatan)->get();
        
        return view('page/backoffice/user/edit', $payload);
    }

    public function update(UpdateUser $request, $id)
    {
        $input = $request->validated();

        $user = User::find($id);
        if (!$user) redirect('backoffice/user')->with('failed_message', 'Data User tidak ditemukan');

        if (isset($input['foto_profil'])) {
            $fileName = uniqid() . '_' . trim($input['foto_profil']->getClientOriginalName());
            $input['foto_profil']->storeAs(config('url.profile'), $fileName);
        }

        $user->email = $input['email'];
        $user->nama = $input['nama'];
        $user->nik = $input['nik'];
        $user->no_hp = $input['no_hp'];
        $user->pendidikan_terakhir = $input['pendidikan_terakhir'];
        $user->foto_profil = isset($fileName) ? $fileName : $user->foto_profil;
        $user->save();
        $user->alamat()->update([
            'id_kecamatan' => $input['kecamatan'],
            'id_desa' => $input['desa'],
            'detail' => $input['detail_alamat']
        ]);;

        return redirect('backoffice/user')->with('success_message', 'Berhasil mengubah data User');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) redirect('backoffice/user')->with('failed_message', 'Data User tidak ditemukan');
        
        $user->delete();
        
        return redirect('backoffice/user')->with('success_message', 'Berhasil menghapus data User');
    }
}
