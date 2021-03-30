<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
    
    protected $table = 'modal';
    public $timestamps = false;
    protected $guarded = [];

    public function modal() {
        return $this->hasMany('App\Model\Umkm', 'id_modal');
    }
}
