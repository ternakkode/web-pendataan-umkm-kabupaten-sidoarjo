<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alamat';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function alamatable() {
        return $this->morphTo();
    }

    public function desa() {
        return $this->belongsTo('App\Model\Desa', 'id_desa');
    }

    public function kecamatan() {
        return $this->belongsTo('App\Model\Kecamatan', 'id_kecamatan');
    }
}
