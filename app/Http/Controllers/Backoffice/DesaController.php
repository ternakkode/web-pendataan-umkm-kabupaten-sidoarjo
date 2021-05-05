<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Model\Desa;
use App\Model\Kecamatan;
use App\Http\Requests\CreateDesa;
use App\Http\Requests\UpdateDesa;
use Illuminate\Http\Request;

class DesaController extends Controller
{

    public function index()
    {
        $payload['desa'] = Desa::with('kecamatan')->get();

        return view('page/backoffice/desa/index', $payload);
    }


    public function create()
    {
        $payload['kecamatan'] = Kecamatan::all();
        return view('page/backoffice/desa/create', $payload);
    }


    public function store(CreateDesa $request)
    {
        $input = $request->validated();
        
        $desa = new Desa();
        $desa->nama = $input['nama'];
        $desa->id_kecamatan = $input['id_kecamatan'];
        $desa->save();

        return redirect('backoffice/desa')->with('success_message', 'Berhasil menambahkan Desa baru');
    }


    public function edit($id)
    {
        $payload['desa'] = Desa::find($id);
        if (!$payload['desa']) redirect('backoffice/desa')->with('failed_message', 'Data Desa tidak ditemukan');
        $payload['kecamatan'] = Kecamatan::all();

        return view('page/backoffice/desa/edit', $payload);
    }

    public function update(UpdateDesa $request, $id)
    {
        $input = $request->validated();

        $desa = Desa::find($id);
        if (!$desa) redirect('backoffice/desa')->with('failed_message', 'Data Desa tidak ditemukan');

        $desa->nama = $input['nama'];
        $desa->id_kecamatan = $input['id_kecamatan'];
        $desa->save();

        return redirect('backoffice/desa')->with('success_message', 'Berhasil mengubah data Desa');
    }

    public function destroy($id)
    {
        $desa = Desa::find($id);
        if (!$desa) redirect('backoffice/desa')->with('failed_message', 'Data Desa tidak ditemukan');
        
        $desa->delete();
        
        return redirect('backoffice/desa')->with('success_message', 'Berhasil menghapus data Desa');
    }
}
