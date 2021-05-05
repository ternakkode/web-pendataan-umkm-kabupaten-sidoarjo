<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Model\LamaUsaha;
use App\Http\Requests\CreateLamaUsaha;
use App\Http\Requests\UpdateLamaUsaha;
use Illuminate\Http\Request;

class LamaUsahaController extends Controller
{

    public function index()
    {
        $payload['lamaUsaha'] = LamaUsaha::all();

        return view('page/backoffice/lama-usaha/index', $payload);
    }


    public function create()
    {
        return view('page/backoffice/lama-usaha/create');
    }


    public function store(CreateLamaUsaha $request)
    {
        $input = $request->validated();
        
        $lamaUsaha = new LamaUsaha();
        $lamaUsaha->nama = $input['nama'];
        $lamaUsaha->save();

        return redirect('backoffice/lama-usaha')->with('success_message', 'Berhasil menambahkan Lama Usaha baru');
    }


    public function edit($id)
    {
        $payload['lamaUsaha'] = LamaUsaha::find($id);
        if (!$payload['lamaUsaha']) redirect('backoffice/lama-usaha')->with('failed_message', 'Data Lama Usaha tidak ditemukan');

        return view('page/backoffice/lama-usaha/edit', $payload);
    }

    public function update(UpdateLamaUsaha $request, $id)
    {
        $input = $request->validated();

        $lamaUsaha = LamaUsaha::find($id);
        if (!$lamaUsaha) redirect('backoffice/lama-usaha')->with('failed_message', 'Data Lama Usaha tidak ditemukan');

        $lamaUsaha->nama = $input['nama'];
        $lamaUsaha->save();

        return redirect('backoffice/lama-usaha')->with('success_message', 'Berhasil mengubah data Lama Usaha');
    }

    public function destroy($id)
    {
        $lamaUsaha = LamaUsaha::find($id);
        if (!$lamaUsaha) redirect('backoffice/lama-usaha')->with('failed_message', 'Data Lama Usaha tidak ditemukan');
        
        $lamaUsaha->delete();
        
        return redirect('backoffice/lama-usaha')->with('success_message', 'Berhasil menghapus data Lama Usaha');
    }
}
