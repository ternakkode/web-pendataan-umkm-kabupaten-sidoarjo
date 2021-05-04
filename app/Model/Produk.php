<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    protected $table = 'produk';
    protected $guarded = [];
    
    public function foto() {
        return $this->hasMany('App\Model\FotoProduk', 'id_produk');
    }

    public function umkm() {
        return $this->belongsTo('App\Model\Umkm', 'id_umkm');
    }
}
