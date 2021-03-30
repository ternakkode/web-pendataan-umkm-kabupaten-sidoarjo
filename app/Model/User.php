<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'user';
    protected $guarded = [];

    public function umkm() {
        return $this->hasMany('App\Model\Umkm', 'id_umkm');
    }

    public function alamat() {
        return $this->morphOne('App\Model\Alamat', 'alamatable');
    }
}
