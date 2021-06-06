<?php

namespace App\Http\Controllers\App\Umkm;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorizeUmkm;
use App\Http\Requests\UmkmRegistration;
use App\Model\Alamat;
use App\Model\Desa;
use App\Model\JenisUsaha;
use App\Model\Kecamatan;
use App\Model\LamaUsaha;
use App\Model\Legalitas;
use App\Model\Modal;
use App\Model\Umkm;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function authorizeUmkm(AuthorizeUmkm $request) {
        $input = $request->validated();

        $umkm = Umkm::find($input['id_umkm']);
        if (!$umkm) return redirect('/app')->with('failed_message', 'UMKM tidak ditemukan!');
        if ($umkm->id_user !== session('logged_in_id')) return redirect('/app')->with('failed_message', 'Anda tidak memili akses pada UMKM tersebut!');

        session([
            'is_on_umkm' => true,
            'umkm_id' => $umkm->id
        ]);

        return redirect('/app/umkm');
    }

    public function registration() {
        $payload['kecamatan'] = Kecamatan::with('desa')->get();
        $payload['jenis_usaha'] = JenisUsaha::all();
        $payload['lama_usaha'] = LamaUsaha::all();
        $payload['legalitas'] = Legalitas::all();
        $payload['modal'] = Modal::all(); 

        return view('page/umkm/registration', $payload);
    }

    public function registrationProcess(UmkmRegistration $request) {
        $input = $request->validated();
        $userId = session('logged_in_id');

        $umkm = new Umkm();
        $umkm->id_user = $userId;
        $umkm->nib = isset($input['nib']) ? $input['nib'] : '';
        $umkm->npwp = isset($input['npwp']) ? $input['npwp'] : '';
        $umkm->nama_usaha = $input['nama_usaha'];
        $umkm->id_lama_usaha = $input['lama_usaha'];
        $umkm->id_jenis_usaha = $input['jenis_usaha'];
        $umkm->id_modal = $input['modal'];
        $umkm->tahun_pendataan = date("Y");
        $umkm->telah_diterima = false;
        $umkm->save();

        $umkm->alamat()->create([
            'id_kecamatan' => $input['kecamatan'],
            'id_desa' => $input['desa'],
            'detail' => $input['detail_alamat']
        ]);
        
        if (isset($input['legalitas'])) {
            $umkm->legalitas()->attach($input['legalitas']);
        }

        return redirect('/app')->with('success_message', 'Selamat! Pengajuan UMKM anda telah berhasil. Silahkan tunggu data anda disetujui');
    }
}
