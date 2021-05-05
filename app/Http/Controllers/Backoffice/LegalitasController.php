<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Model\Legalitas;
use App\Http\Requests\CreateLegalitas;
use App\Http\Requests\UpdateLegalitas;
use Illuminate\Http\Request;

class LegalitasController extends Controller
{

    public function index()
    {
        $payload['legalitas'] = Legalitas::all();

        return view('page/backoffice/legalitas/index', $payload);
    }


    public function create()
    {
        return view('page/backoffice/legalitas/create');
    }


    public function store(CreateLegalitas $request)
    {
        $input = $request->validated();
        
        $legalitas = new Legalitas();
        $legalitas->nama = $input['nama'];
        $legalitas->save();

        return redirect('backoffice/legalitas')->with('success_message', 'Berhasil menambahkan Legalitas baru');
    }


    public function edit($id)
    {
        $payload['legalitas'] = Legalitas::find($id);
        if (!$payload['legalitas']) redirect('backoffice/legalitas')->with('failed_message', 'Data Legalitas tidak ditemukan');

        return view('page/backoffice/legalitas/edit', $payload);
    }

    public function update(UpdateLegalitas $request, $id)
    {
        $input = $request->validated();

        $legalitas = Legalitas::find($id);
        if (!$legalitas) redirect('backoffice/legalitas')->with('failed_message', 'Data Legalitas tidak ditemukan');

        $legalitas->nama = $input['nama'];
        $legalitas->save();

        return redirect('backoffice/legalitas')->with('success_message', 'Berhasil mengubah data Legalitas');
    }

    public function destroy($id)
    {
        $legalitas = Legalitas::find($id);
        if (!$legalitas) redirect('backoffice/legalitas')->with('failed_message', 'Data Legalitas tidak ditemukan');
        
        $legalitas->delete();
        
        return redirect('backoffice/legalitas')->with('success_message', 'Berhasil menghapus data Legalitas');
    }
}
