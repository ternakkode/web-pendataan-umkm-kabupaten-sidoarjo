<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Model\Kecamatan;
use App\Http\Requests\CreateKecamatan;
use App\Http\Requests\UpdateKecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{

    public function index()
    {
        $payload['kecamatan'] = Kecamatan::all();

        return view('page/backoffice/kecamatan/index', $payload);
    }


    public function create()
    {
        return view('page/backoffice/kecamatan/create');
    }


    public function store(CreateKecamatan $request)
    {
        $input = $request->validated();
        
        $kecamatan = new Kecamatan();
        $kecamatan->nama = $input['nama'];
        $admin->save();

        return redirect('backoffice/kecamatan')->with('success_message', 'Berhasil menambahkan Kecamatan baru');
    }


    public function edit($id)
    {
        $payload['kecamatan'] = Kecamatan::find($id);
        if (!$payload['kecamatan']) redirect('backoffice/kecamatan')->with('failed_message', 'Data Kecamatan tidak ditemukan');

        return view('page/backoffice/kecamatan/edit', $payload);
    }

    public function update(UpdateKecamatan $request, $id)
    {
        $input = $request->validated();

        $kecamatan = Kecamatan::find($id);
        if (!$kecamatan) redirect('backoffice/kecamatan')->with('failed_message', 'Data Kecamatan tidak ditemukan');

        $kecamatan->nama = $input['nama'];
        $kecamatan->save();

        return redirect('backoffice/kecamatan')->with('success_message', 'Berhasil mengubah data Kecamatan');
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::find($id);
        if (!$kecamatan) redirect('backoffice/kecamatan')->with('failed_message', 'Data Kecamatan tidak ditemukan');
        
        $kecamatan->delete();
        
        return redirect('backoffice/kecamatan')->with('success_message', 'Berhasil menghapus data Kecamatan');
    }
}
