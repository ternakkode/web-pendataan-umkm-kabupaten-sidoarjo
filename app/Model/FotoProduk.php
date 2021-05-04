<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FotoProduk extends Model
{

    protected $table = 'foto_produk';
    public $timestamps = false;
    protected $guarded = [];
    
    public function produk() {
        return $this->belongsTo('App\Model\Produk', 'id_produk');
    }
}
