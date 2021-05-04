<?php

namespace App\Http\Controllers\App\Umkm;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUmkmInformation;
use App\Model\Desa;
use App\Model\JenisUsaha;
use App\Model\Kecamatan;
use App\Model\LamaUsaha;
use App\Model\Legalitas;
use App\Model\Modal;
use App\Model\Umkm;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('page/umkm/dashboard');
    }

    public function editInformation() {
        $payload['umkm'] = Umkm::find(session('umkm_id'));
        $payload['kecamatan'] = Kecamatan::with('desa')->get();
        $payload['desa'] = Desa::where('id_kecamatan', $payload['umkm']->alamat->id_kecamatan)->get();
        $payload['jenis_usaha'] = JenisUsaha::all();
        $payload['lama_usaha'] = LamaUsaha::all();
        $payload['legalitas'] = Legalitas::all();
        $payload['modal'] = Modal::all(); 

        return view('page/umkm/edit-information', $payload);
    }
    
    public function processEditInformation(EditUmkmInformation $request) {
        $input = $request->validated();
        
        $umkm = Umkm::find(session('umkm_id'));
        $umkm->nib = $input['nib'];
        $umkm->nama_usaha = $input['nama_usaha'];
        $ukmkm->id_lama_usaha = $input['lama_usaha'];
        $umkm->id_jenis_usaha = $input['jenis_usaha'];
        $umkm->id_modal = $input['modal'];
        $umkm->npwp = $input['npwp'];
        $umkm->tahun_pendataan = date("Y");
        $umkm->alamat()->id_kecamatan = $input['kecamatan'];
        $umkm->alamat()->id_desa = $input['desa'];
        $umkm->alamat()->detail = $input['detail_alamat'];
        $umkm->legalitas()->detach();
        $umkm->legalitas()->attach($input['legalitas']);

        return redirect('/app/umkm')->with('success_message', 'Selamat! Data UMKM anda telah berhasil diubah'); // TODO: tambah success handling di view
        
    }
}
