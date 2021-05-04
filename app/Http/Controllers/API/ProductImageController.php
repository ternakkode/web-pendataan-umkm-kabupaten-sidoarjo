<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\FotoProduk;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function upload(Request $request) {
        $image = $request->file('file');
        
        $fileName = uniqid() . '_' . trim($image->getClientOriginalName());
        
        $image->storeAs(config('url.tmp_product'), $fileName);

        return response()->json([
            'name' => $fileName,
            'original_name' => $image->getClientOriginalName()
        ]);
    }

    public function setPrimary($idProduk, $idImage) {
        FotoProduk::where([
            ['id_produk', '=', $idProduk],
            ['foto_utama', '=', true]
        ])->update(['foto_utama' => false]);

        FotoProduk::where('id', $idImage)->update(['foto_utama' => true]);

        return FotoProduk::where('id_produk', $idProduk)->get();
    }

    public function delete($idProduk, $idImage) {
        $fotoProduk = FotoProduk::find($idImage);
        if ($fotoProduk->foto_utama) {
            $randomPhoto = FotoProduk::where('id', '!=', $idImage)->first();
            $randomPhoto->foto_utama = true;
            $randomPhoto->save();
        }
        
        $fotoProduk->delete();

        return FotoProduk::where('id_produk', $idProduk)->get();
    }
}
