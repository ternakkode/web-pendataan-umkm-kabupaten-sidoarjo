<?php

namespace App\Http\Controllers\Backoffice;

use App\Exports\SemuaUMKM;
use App\Http\Controllers\Controller;
use App\Mail\UMKMDiterima;
use App\Mail\UMKMDitolak;
use App\Model\Alamat;
use App\Model\Desa;
use App\Model\JenisUsaha;
use App\Model\Kecamatan;
use App\Model\LamaUsaha;
use App\Model\Legalitas;
use App\Model\Modal;
use App\Model\Umkm;
use App\Model\User;
use App\Http\Requests\CreateUmkm;
use App\Http\Requests\UpdateUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class UmkmController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->query('status');

        if ($status == 'pending') {
            $payload['status'] = 'pending';
            $payload['umkm'] = Umkm::where('telah_diterima', 0)->whereNull('diterima_pada')->get();
        } else {
            $payload['status'] = 'all';
            $payload['umkm'] = Umkm::all();
        }

        return view('page/backoffice/umkm/index', $payload);
    }

    public function exportAll() {
        return Excel::download(new SemuaUMKM, 'data-umkm-sidoarjo.xlsx');
    }

    public function create()
    {
        $payload['user'] = User::all();
        $payload['kecamatan'] = Kecamatan::with('desa')->get();
        $payload['jenis_usaha'] = JenisUsaha::all();
        $payload['lama_usaha'] = LamaUsaha::all();
        $payload['legalitas'] = Legalitas::all();
        $payload['modal'] = Modal::all(); 

        return view('page/backoffice/umkm/create', $payload);
    }


    public function store(CreateUmkm $request)
    {
        $input = $request->validated();

        $umkm = new Umkm();
        $umkm->nib = isset($input['nib']) ? $input['nib'] : 0;
        $umkm->npwp = isset($input['npwp']) ? $input['npwp'] : '';
        $umkm->nama_usaha = $input['nama_usaha'];
        $umkm->id_user = $input['user'];
        $umkm->id_lama_usaha = $input['lama_usaha'];
        $umkm->id_jenis_usaha = $input['jenis_usaha'];
        $umkm->id_modal = $input['modal'];
        $umkm->tahun_pendataan = date("Y");
        $umkm->telah_diterima = true;
        $umkm->diterima_pada = date("Y-m-d");
        $umkm->save();

        $umkm->alamat()->create([
            'id_kecamatan' => $input['kecamatan'],
            'id_desa' => $input['desa'],
            'detail' => $input['detail_alamat']
        ]);
        
        if (isset($input['legalitas'])) {
            $umkm->legalitas()->attach($input['legalitas']);
        }

        return redirect('backoffice/umkm')->with('success_message', 'Berhasil menambahkan UMKM baru');
    }

    public function show($id)
    {
        $payload['umkm'] = Umkm::find($id);
        if (!$payload['umkm']) redirect('backoffice/umkm')->with('failed_message', 'Data UMKM tidak ditemukan');

        return view('page/backoffice/umkm/detail', $payload);
    }

    public function edit($id)
    {
        $payload['umkm'] = Umkm::find($id);
        if (!$payload['umkm']) redirect('backoffice/umkm')->with('failed_message', 'Data UMKM tidak ditemukan');

        $payload['user'] = User::all();
        $payload['kecamatan'] = Kecamatan::with('desa')->get();
        $payload['desa'] = Desa::where('id_kecamatan', $payload['umkm']->alamat->id_kecamatan)->get();
        $payload['jenis_usaha'] = JenisUsaha::all();
        $payload['lama_usaha'] = LamaUsaha::all();
        $payload['legalitas'] = Legalitas::all();
        $payload['modal'] = Modal::all(); 

        return view('page/backoffice/umkm/edit', $payload);
    }

    public function update(UpdateUmkm $request, $id)
    {
        $input = $request->validated();
        
        $umkm = Umkm::find($id);
        $umkm->nib = $input['nib'];
        $umkm->nama_usaha = $input['nama_usaha'];
        $umkm->id_user = $input['user'];
        $umkm->id_lama_usaha = $input['lama_usaha'];
        $umkm->id_jenis_usaha = $input['jenis_usaha'];
        $umkm->id_modal = $input['modal'];
        $umkm->npwp = $input['npwp'];
        $umkm->tahun_pendataan = date("Y");
        $umkm->alamat()->id_kecamatan = $input['kecamatan'];
        $umkm->alamat()->id_desa = $input['desa'];
        $umkm->alamat()->detail = $input['detail_alamat'];
        $umkm->legalitas()->detach();
        $umkm->legalitas()->attach($input['legalitas']);

        return redirect('backoffice/umkm')->with('success_message', 'Berhasil mengubah data UMKM');
    }

    public function destroy($id)
    {
        $umkm = Umkm::find($id);
        if (!$umkm) redirect('backoffice/umkm')->with('failed_message', 'Data UMKM tidak ditemukan');
        
        $umkm->delete();
        
        return redirect('backoffice/umkm')->with('success_message', 'Berhasil menghapus data UMKM');
    }

    public function approval($id, Request $request) {
        $status = $request->query('status');

        $umkm = Umkm::find($id);
        if (!$umkm) redirect('backoffice/umkm')->with('failed_message', 'Data UMKM tidak ditemukan');

        switch($status) {
            case 'approve':
                $umkm->telah_diterima = true;
                $umkm->diterima_pada = date("Y-m-d");
                Mail::to($umkm->user->email)->send(new UMKMDiterima($umkm));
                break;
            case 'deny':
                $umkm->telah_diterima = false;
                $umkm->diterima_pada = date("Y-m-d");

                $alasanPenolakan = $request->query('alasan_penolakan');
                Mail::to($umkm->user->email)->send(new UMKMDitolak($umkm, $alasanPenolakan));
                break;
            default:
                break;
        }

        $umkm->save();

        return redirect('backoffice/umkm?status=pending')->with('success_message', 'Berhasil melakukan approval terhadap UMKM');
    }

    public function cetak($id) {
        $payload['umkm'] = Umkm::find($id);
        if (!$payload['umkm']) redirect('backoffice/umkm')->with('failed_message', 'Data UMKM tidak ditemukan');

        return view('pdf/data-umkm', $payload);;
    }
}
