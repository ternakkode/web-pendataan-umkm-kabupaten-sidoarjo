<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LamaUsaha extends Model
{
    
    protected $table = 'lama_usaha';
    public $timestamps = false;
    protected $guarded = [];

    public function umkm() {
        return $this->hasMany('App\Model\Umkm', 'id_lama_usaha');
    }
}
