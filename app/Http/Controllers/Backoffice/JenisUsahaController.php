<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Model\JenisUsaha;
use App\Http\Requests\CreateJenisUsaha;
use App\Http\Requests\UpdateJenisUsaha;
use Illuminate\Http\Request;

class JenisUsahaController extends Controller
{

    public function index()
    {
        $payload['jenisUsaha'] = JenisUsaha::all();

        return view('page/backoffice/jenis-usaha/index', $payload);
    }


    public function create()
    {
        return view('page/backoffice/jenis-usaha/create');
    }


    public function store(CreateJenisUsaha $request)
    {
        $input = $request->validated();
        
        $jenisUsaha = new JenisUsaha();
        $jenisUsaha->nama = $input['nama'];
        $jenisUsaha->save();

        return redirect('backoffice/jenis-usaha')->with('success_message', 'Berhasil menambahkan Jenis Usaha baru');
    }


    public function edit($id)
    {
        $payload['jenisUsaha'] = JenisUsaha::find($id);
        if (!$payload['jenisUsaha']) redirect('backoffice/jenis-usaha')->with('failed_message', 'Data Jenis Usaha tidak ditemukan');

        return view('page/backoffice/jenis-usaha/edit', $payload);
    }

    public function update(UpdateJenisUsaha $request, $id)
    {
        $input = $request->validated();

        $jenisUsaha = JenisUsaha::find($id);
        if (!$jenisUsaha) redirect('backoffice/jenis-usaha')->with('failed_message', 'Data Jenis Usaha tidak ditemukan');

        $jenisUsaha->nama = $input['nama'];
        $jenisUsaha->save();

        return redirect('backoffice/jenis-usaha')->with('success_message', 'Berhasil mengubah data Jenis Usaha');
    }

    public function destroy($id)
    {
        $jenisUsaha = JenisUsaha::find($id);
        if (!$jenisUsaha) redirect('backoffice/jenis-usaha')->with('failed_message', 'Data Jenis Usaha tidak ditemukan');
        
        $jenisUsaha->delete();
        
        return redirect('backoffice/jenis-usaha')->with('success_message', 'Berhasil menghapus data Jenis Usaha');
    }
}
