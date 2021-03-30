<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Legalitas extends Model
{

    protected $table = 'legalitas';
    public $timestamps = false;
    protected $guarded = [];

    public function umkm() {
        return $this->belongsToMany('App\Model\Umkm', 'umkm_legalitas', 'id_legalitas', 'id_umkm');
    }
}
