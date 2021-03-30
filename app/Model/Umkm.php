<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{

    protected $table = 'umkm';
    protected $with = ['jenisUsaha', 'lamaUsaha', 'legalitas', 'modal', 'alamat'];
    protected $guarded = [];

    public function jenisUsaha() {
        return $this->belongsTo('App\Model\JenisUsaha', 'id_jenis_usaha');
    }

    public function lamaUsaha() {
        return $this->belongsTo('App\Model\LamaUsaha', 'id_lama_usaha');
    }

    public function modal() {
        return $this->belongsTo('App\Model\Modal', 'id_modal');
    }

    public function legalitas() {
        return $this->belongsToMany('App\Model\legalitas', 'umkm_legalitas', 'id_umkm', 'id_legalitas');
    }

    public function alamat() {
        return $this->morphOne('App\Model\Alamat', 'alamatable');
    }
}
