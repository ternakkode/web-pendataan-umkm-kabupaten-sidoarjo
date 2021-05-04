<?php

use App\Model\Umkm;
use App\Model\User;
use Illuminate\Database\Seeder;

class UmkmSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        $umkm = new Umkm();
        $umkm->id_user = $user->id;
        $umkm->nib = 1234567890;
        $umkm->nama_usaha = 'Bakso Pa Nanang';
        $umkm->id_lama_usaha = 6;
        $umkm->id_jenis_usaha = 1;
        $umkm->id_modal = 6;
        $umkm->npwp = '09.254.294.3-407.000';
        $umkm->tahun_pendataan = date("Y");
        $umkm->telah_diterima = true;
        $umkm->diterima_pada = date("Y-m-d");
        $umkm->save();

        $umkm->alamat()->create([
            'id_kecamatan' => 1,
            'id_desa' => 1,
            'detail' => 'DISINI SENANG DISANA SENANG DIMANA MANA HATIKU SENANG'
        ]);
        
        $umkm->legalitas()->attach([1, 2, 3, 4]);
    }
}
