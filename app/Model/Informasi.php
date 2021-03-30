<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{

    protected $table = 'informasi';
    protected $guarded = [];

    public function admin() {
        return $this->belongsTo('App\Model\Admin');
    }
}
