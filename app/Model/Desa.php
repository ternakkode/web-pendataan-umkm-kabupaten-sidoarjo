<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{

    protected $table = 'desa';
    public $timestamps = false;
    protected $guarded = [];

    public function kecamatan() {
        return $this->belongsTo('App\Model\Kecamatan', 'id_kecamatan');
    }

    public function alamat() {
        return $this->belongsTo('App\Model\Alamat', 'id_alamat');
    }
}
