<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'informasi';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function admin() {
        return $this->belongsTo('App\Model\Admin');
    }
}
