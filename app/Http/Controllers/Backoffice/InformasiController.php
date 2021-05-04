<?php

namespace App\Http\Controllers\Backoffice;

use App\Model\Informasi;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateInformasi;
use App\Http\Requests\UpdateInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{

    public function index()
    {
        $payload['informasi'] = Informasi::with('admin')->get();
        return view('page/backoffice/informasi/index', $payload);
    }

    public function create()
    {
        return view('page/backoffice/informasi/create');
    }

    public function store(CreateInformasi $request)
    {
        $input = $request->validated();
        
        $fileName = uniqid() . '_' . trim($input['foto']->getClientOriginalName());
        $input['foto']->storeAs(config('url.information'), $fileName);

        $informasi = new Informasi();
        $informasi->id_admin = session('logged_in_id');
        $informasi->judul = $input['judul'];
        $informasi->foto = $fileName;
        $informasi->deskripsi = $input['deskripsi'];
        $informasi->telah_terbit = isset($input['publish']) ? true : false;
        $informasi->terbit_pada = isset($input['publish']) ? Carbon::now() : null;
        $informasi->save();

        return redirect('backoffice/informasi')->with('success_message', 'Berhasil menambahkan Informasi baru'); 
    }

    public function show($id)
    {
        $payload['informasi'] = Informasi::find($id);
        if (!$payload['informasi']) redirect('backoffice/informasi')->with('failed_message', 'Data Informasi tidak ditemukan');

        return view('page/backoffice/informasi/detail', $payload);
    }

    public function edit($id)
    {
        $payload['informasi'] = Informasi::find($id);
        if (!$payload['informasi']) redirect('backoffice/informasi')->with('failed_message', 'Data Informasi tidak ditemukan');

        return view('page/backoffice/informasi/edit', $payload);
    }

    public function update(UpdateInformasi $request, $id)
    {
        $input = $request->validated();
        
        $informasi = Informasi::find($id);
        if (!$informasi) redirect('backoffice/informasi')->with('failed_message', 'Data Informasi tidak ditemukan');

        $informasi->id_admin = session('logged_in_id');
        $informasi->judul = $input['judul'];

        if (isset($input['foto'])) {
            $fileName = uniqid() . '_' . trim($input['foto']->getClientOriginalName());
            $input['foto']->storeAs(config('url.information'), $fileName);
            
            $informasi->foto = $fileName;
        }

        $informasi->deskripsi = $input['deskripsi'];
        $informasi->telah_terbit = isset($input['publish']) ? true : false;
        $informasi->terbit_pada = isset($input['publish']) ? Carbon::now() : null;
        $informasi->save();

        return redirect('backoffice/informasi')->with('success_message', 'Berhasil mengubah data informasi'); 
    }

    public function destroy($id)
    {
        $informasi = Informasi::find($id);
        if (!$informasi) redirect('backoffice/informasi')->with('failed_message', 'Data Informasi tidak ditemukan');
        $informasi->delete();

        return redirect('backoffice/informasi')->with('success_message', 'Berhasil menghapus data Informasi'); 
    }
}
