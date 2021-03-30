<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{

    protected $table = 'kecamatan';
    public $timestamps = false;
    protected $guarded = [];

    public function desa() {
        return $this->hasMany('App\Model\Desa', 'id_kecamatan');
    }

    public function alamat() {
        return $this->hasMany('App\Model\Alamat', 'id_alamat');
    }
}
