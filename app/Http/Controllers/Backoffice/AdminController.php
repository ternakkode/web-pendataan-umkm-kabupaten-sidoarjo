<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Http\Requests\CreateAdmin;
use App\Http\Requests\UpdateAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $payload['admins'] = Admin::all();

        return view('page/backoffice/admin/index', $payload);
    }


    public function create()
    {
        return view('page/backoffice/admin/create');
    }


    public function store(CreateAdmin $request)
    {
        $input = $request->validated();
        
        $admin = new Admin();
        $admin->nama = $input['nama'];
        $admin->username = $input['username'];
        $admin->password = Hash::make($input['password']);
        $admin->save();

        return redirect('backoffice/admin')->with('success_message', 'Berhasil menambahkan Pengurus baru');
    }


    public function edit($id)
    {
        $payload['admin'] = Admin::find($id);
        if (!$payload['admin']) redirect('backoffice/admin')->with('failed_message', 'Data pengurus tidak ditemukan');

        return view('page/backoffice/admin/edit', $payload);
    }

    public function update(UpdateAdmin $request, $id)
    {
        $input = $request->validated();

        $admin = Admin::find($id);
        if (!$admin) redirect('backoffice/admin')->with('failed_message', 'Data pengurus tidak ditemukan');

        $admin->nama = $input['nama'];
        $admin->username = $input['username'];
        $admin->password = isset($input['password']) ? Hash::make($input['password']) : $admin->password; 
        $admin->save();

        return redirect('backoffice/admin')->with('success_message', 'Berhasil mengubah data Pengurus');
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        if (!$admin) redirect('backoffice/admin')->with('failed_message', 'Data pengurus tidak ditemukan');
        
        $admin->delete();
        
        return redirect('backoffice/admin')->with('success_message', 'Berhasil menghapus data Pengurus');
    }
}
