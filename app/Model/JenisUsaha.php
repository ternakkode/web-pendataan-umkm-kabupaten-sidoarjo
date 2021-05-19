<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JenisUsaha extends Model
{
    
    protected $table = 'jenis_usaha';
    public $timestamps = false;
    protected $guarded = [];

    public function umkm() {
        return $this->hasMany('App\Model\Umkm', 'id_jenis_usaha');
    }
}
