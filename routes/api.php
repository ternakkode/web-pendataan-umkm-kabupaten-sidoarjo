<?php

use Illuminate\Http\Request;


Route::post('umkm/produk/image/upload', 'API\ProductImageController@upload');
Route::patch('umkm/produk/{idProduk}/image/{idImage}', 'API\ProductImageController@setPrimary');
Route::delete('umkm/produk/{idProduk}/image/{idImage}', 'API\ProductImageController@delete');
