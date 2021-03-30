<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $table = 'admin';
    protected $guarded = [];

    public function informasi() {
        return $this->hasMany('App\Model\Informasi');
    }
}
