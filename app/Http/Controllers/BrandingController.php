<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Alamat;
use App\Model\Desa;
use App\Model\Informasi;
use App\Model\JenisUsaha;
use App\Model\Kecamatan;
use App\Model\LamaUsaha;
use App\Model\Legalitas;
use App\Model\Modal;
use App\Model\Produk;
use App\Model\Umkm;
use App\Model\User;
use DB;
use Illuminate\Http\Request;

class BrandingController extends Controller {
    public function index() {
        $payload['totalUmkm'] = Umkm::count();
        $payload['produkRandom'] = Produk::limit(8)->inRandomOrder()->get();
        $payload['informasiTerbaru'] = Informasi::limit(3)->get();

        return view('page/front/index', $payload);
    }

    public function umkm(Request $request) {
        $jenisUsaha = $request->query('jenis_usaha');

        $payload['umkm'] = new Umkm();
        if ($jenisUsaha) {
            $payload['umkm'] = $payload['umkm']->where('id_jenis_usaha', $jenisUsaha);
        }
        $payload['umkm'] = $payload['umkm']->get();
        $payload['jenisUsaha'] = JenisUsaha::all();
        $payload['totalUmkm'] = Umkm::count();
        $payload['totalJenisUsaha'] = JenisUsaha::count();

        return view('page/front/umkm', $payload);
    }

    public function detailUmkm(Request $request, $id) {
        $jenisUsaha = $request->query('jenis_usaha');
        $keyword = $request->query('keyword');

        $payload['umkm'] = Umkm::find($id);
        if (!$payload['umkm']) redirect('/')->with('failed_message', 'Data UMKM tidak ditemukan');
        
        $payload['jenisUsaha'] = JenisUsaha::all();
        $payload['paginatedProduk'] = Produk::with('foto')->where('id_umkm', $id);
        if ($jenisUsaha) $payload['paginatedProduk'] = $payload['paginatedProduk']->whereHas('umkm', function ($query) use ($jenisUsaha) { $query->where('id_jenis_usaha', $jenisUsaha); } );
        if ($keyword) $payload['paginatedProduk'] = $payload['paginatedProduk']->where('nama', 'like', '%'.$keyword.'%');
        $payload['paginatedProduk'] = $payload['paginatedProduk']->paginate(8);

        return view('page/front/umkm-detail', $payload);
    }

    public function produk(Request $request) {
        $jenisUsaha = $request->query('jenis_usaha');
        $keyword = $request->query('keyword');
        
        $payload['jenisUsaha'] = JenisUsaha::all();
        $payload['paginatedProduk'] = Produk::with('foto');
        if ($jenisUsaha) $payload['paginatedProduk'] = $payload['paginatedProduk']->whereHas('umkm', function ($query) use ($jenisUsaha) { $query->where('id_jenis_usaha', $jenisUsaha); } );
        if ($keyword) $payload['paginatedProduk'] = $payload['paginatedProduk']->where('nama', 'like', '%'.$keyword.'%');
        $payload['paginatedProduk'] = $payload['paginatedProduk']->paginate(8);

        return view('page/front/produk', $payload);
    }

    public function detailProduk($id) {
        $payload['produk'] = Produk::with('foto')->find($id);
        if (!$payload['produk']) redirect('/')->with('failed_message', 'Data Produk tidak ditemukan');

        return view('page/front/detail-produk', $payload);
    }

    public function informasi() {
        $payload['paginatedInformasi'] = Informasi::paginate(9);

        return view('page/front/informasi', $payload);
    }

    public function detailInformasi($id) {
        $payload['informasi'] = Informasi::find($id);
        if (!$payload['informasi']) redirect('/')->with('failed_message', 'Data Informasi tidak ditemukan');

        return view('page/front/detail-informasi', $payload);
    }

    public function tentangKami() {
        return view('page/front/tentang-kami');
    }

    public function statistik(Request $request) {
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

        return view('page/front/statistik', $payload);
    }
}
