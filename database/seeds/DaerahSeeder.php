<?php

use App\Model\Desa;
use App\Model\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DaerahSeeder extends Seeder
{
    public function run()
    {
        $kecamatan = json_decode(File::get("database/seeds/data/kecamatan.json"));
        foreach ($kecamatan as $kec) {
            Kecamatan::create([
                'nama' => $kec->nama
            ]);
        }

        $desa = json_decode(File::get("database/seeds/data/desa.json"));
        foreach ($desa as $des) {
            Desa::create([
                'id_kecamatan' => $des->id_kecamatan,
                'nama' => $des->nama
            ]);
        }
    }
}
