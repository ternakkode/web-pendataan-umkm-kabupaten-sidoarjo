<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\JenisUsaha;
use App\Model\Informasi;
use App\Model\Produk;
use App\Model\Umkm;
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

    public function detailUmkm($id) {
        return view('page/front/umkm-detail');
    }

    public function produk() {
        return view('page/front/produk');
    }

    public function detailProduk($id) {
        return view('page/front/detail-produk');
    }

    public function informasi() {
        return view('page/front/informasi');
    }

    public function tentangKami() {
        return view('page/front/tentang-kami');
    }
}
