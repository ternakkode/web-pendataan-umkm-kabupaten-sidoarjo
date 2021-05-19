<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Model\Alamat;
use App\Model\Desa;
use App\Model\JenisUsaha;
use App\Model\LamaUsaha;
use App\Model\Modal;
use App\Model\Legalitas;
use App\Model\Kecamatan;
use App\Model\Umkm;
use App\Model\User;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $chartGroupBy = $request->query->get('chart') ?? 'jenis_usaha';

        $payload['label'] = [];
        $payload['data'] = [];
        $payload['total'] = 0;

        switch ($chartGroupBy) {
            case 'jenis_usaha':
                $result = JenisUsaha::withCount('umkm')->get();
                break;
            case 'lama_usaha':
                $result = LamaUsaha::withCount('umkm')->get();
                break;
            case 'legalitas':
                $result = Legalitas::withCount('umkm')->get();
                break;
            case 'modal':
                $result = Modal::withCount('umkm')->get();
                break;
            case 'kecamatan_pemilik':
                $result = Alamat::with('kecamatan')->select(DB::raw('count(*) as total, id_kecamatan'))->where('alamatable_type', User::class)->groupBy('id_kecamatan')->get();
                break;
            case 'kecamatan_umkm';
                $result = Alamat::with('kecamatan')->select(DB::raw('count(*) as total, id_kecamatan'))->where('alamatable_type', Umkm::class)->groupBy('id_kecamatan')->get();
                break;
            case 'kelurahan_pemilik':
                $result = Alamat::with('desa')->select(DB::raw('count(*) as total, id_desa'))->where('alamatable_type', User::class)->groupBy('id_desa')->get();
                break;
            case 'kelurahan_umkm':
                $result = Alamat::with('desa')->select(DB::raw('count(*) as total, id_desa'))->where('alamatable_type', Umkm::class)->groupBy('id_desa')->get();
                break;
            default:
                return redirect('backoffice');
        }

        if (in_array($chartGroupBy, ['jenis_usaha', 'lama_usaha', 'legalitas', 'modal'])) {
            foreach ($result as $d) {
                array_push($payload['label'], $d['nama']);
                array_push($payload['data'], $d['umkm_count']);
           }
        } else if (in_array($chartGroupBy, ['kecamatan_pemilik', 'kecamatan_umkm'])) {
            foreach ($result as $d) {
                array_push($payload['label'], $d->kecamatan->nama);
                array_push($payload['data'], $d->total);
            }
        } else if (in_array($chartGroupBy, ['kelurahan_pemilik', 'kelurahan_umkm'])) {
            foreach ($result as $d) {
                array_push($payload['label'], $d->desa->nama);
                array_push($payload['data'], $d->total);
            }
        }

        $payload['total'] = count($payload['label']);
        $payload['group_by'] = $chartGroupBy;

        return view('page/backoffice/index', $payload);
    }
}
