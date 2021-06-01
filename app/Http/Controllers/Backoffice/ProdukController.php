<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Model\FotoProduk;
use App\Model\Produk;
use App\Model\Umkm;
use App\Http\Requests\CreateProduk;
use App\Http\Requests\UpdateProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{

    public function index($idUmkm)
    {
        $payload['umkm'] = Umkm::find($idUmkm);
        $payload['produk'] = Produk::where('id_umkm', $idUmkm)->get();

        return view('page/backoffice/umkm/produk/index', $payload);
    }


    public function create($idUmkm)
    {
        $payload['umkm'] = Umkm::find($idUmkm);

        return view('page/backoffice/umkm/produk/create', $payload);
    }


    public function store(CreateProduk $request, $idUmkm)
    {
        $input = $request->validated();

        $produk = new Produk();
        $produk->id_umkm = $idUmkm;
        $produk->nama = $input['nama'];
        $produk->harga = $input['harga'];
        $produk->deskripsi = $input['deskripsi'];
        $produk->save();

        $photos = [];
        $oldStorageFolder = config('url.tmp_product');
        $newStorageFolder = config('url.product');

        foreach ($input['foto'] as $foto) {
            $moveFile = Storage::move($oldStorageFolder. '/' .$foto, $newStorageFolder. '/' .$foto);
            if ($moveFile) {
                $newFoto = [];
                $newFoto['url'] = $foto;
                $newFoto['foto_utama'] = empty($photos) ? 1 : 0;
                array_push($photos, $newFoto);
            }
        }

        $produk->foto()->createMany($photos);

        return redirect('backoffice/umkm/'.$idUmkm.'/produk')->with('success_message', 'Berhasil menambahkan data Produk UMKM');
    }


    public function edit($idUmkm, $idProduk)
    {
        $payload['produk'] = Produk::find($idProduk);
        if (!$payload['produk']) redirect('backoffice/umkm/'.$idUmkm.'/produk')->with('failed_message', 'Data Produk UMKM tidak ditemukan');
        
        return view('page/backoffice/umkm/produk/edit', $payload);
    }

    public function update(UpdateProduk $request, $idUmkm, $idProduk)
    {
        $input = $request->validated();

        $produk = Produk::find($idProduk);
        $produk->nama = $input['nama'];
        $produk->harga = $input['harga'];
        $produk->deskripsi = $input['deskripsi'];
        $produk->save();

        $photos = [];
        $oldStorageFolder = config('url.tmp_product');
        $newStorageFolder = config('url.product');
        $currentProductImage = FotoProduk::where('id_produk', $idProduk)->get();

        if ($input['foto']) {
            foreach ($input['foto'] as $foto) {
                $moveFile = Storage::move($oldStorageFolder. '/' .$foto, $newStorageFolder. '/' .$foto);
                if ($moveFile) {
                    $newFoto = [];
                    $newFoto['url'] = $foto;
                    $newFoto['foto_utama'] = empty($photos) && $currentProductImage->isEmpty() ? 1 : 0;
                    array_push($photos, $newFoto);
                }
            }
    
            $produk->foto()->createMany($photos);
        }

        return redirect('backoffice/umkm/'.$idUmkm.'/produk')->with('success_message', 'Berhasil mengubah data Produk UMKM');
    }

    public function destroy($idUmkm, $idProduk)
    {
        $produk = Produk::find($idProduk);
        if (!$produk) redirect('backoffice/umkm/'.$idUmkm.'/produk')->with('failed_message', 'Data Produk tidak ditemukan');

        foreach($produk->foto as $foto) {
            Storage::delete(config('url.product'). '/' .$foto);
        }

        $produk->delete();
        
        return redirect('backoffice/umkm/'.$idUmkm.'/produk')->with('success_message', 'Berhasil menghapus data Produk UMKM');
    }
}
