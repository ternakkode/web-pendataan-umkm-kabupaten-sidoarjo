<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Model\Modal;
use App\Http\Requests\CreateModal;
use App\Http\Requests\UpdateModal;
use Illuminate\Http\Request;

class ModalController extends Controller
{

    public function index()
    {
        $payload['modal'] = Modal::all();

        return view('page/backoffice/modal/index', $payload);
    }


    public function create()
    {
        return view('page/backoffice/modal/create');
    }


    public function store(CreateModal $request)
    {
        $input = $request->validated();
        
        $modal = new Modal();
        $modal->nama = $input['nama'];
        $admin->save();

        return redirect('backoffice/modal')->with('success_message', 'Berhasil menambahkan Modal baru');
    }


    public function edit($id)
    {
        $payload['modal'] = Modal::find($id);
        if (!$payload['modal']) redirect('backoffice/modal')->with('failed_message', 'Data Modal tidak ditemukan');

        return view('page/backoffice/modal/edit', $payload);
    }

    public function update(UpdateModal $request, $id)
    {
        $input = $request->validated();

        $modal = Modal::find($id);
        if (!$modal) redirect('backoffice/modal')->with('failed_message', 'Data Modal tidak ditemukan');

        $modal->nama = $input['nama'];
        $modal->save();

        return redirect('backoffice/modal')->with('success_message', 'Berhasil mengubah data Modal');
    }

    public function destroy($id)
    {
        $modal = Modal::find($id);
        if (!$modal) redirect('backoffice/modal')->with('failed_message', 'Data Modal tidak ditemukan');
        
        $modal->delete();
        
        return redirect('backoffice/modal')->with('success_message', 'Berhasil menghapus data Modal');
    }
}
