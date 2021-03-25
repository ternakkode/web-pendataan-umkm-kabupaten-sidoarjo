<?php

use App\Model\JenisUsaha;
use App\Model\LamaUsaha;
use App\Model\Legalitas;
use App\Model\Modal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UMKMFormDataSeeder extends Seeder
{
    public function run()
    {
        $jenisUsaha = json_decode(File::get("database/seeds/data/jenis-usaha.json"));
        foreach ($jenisUsaha as $ju) {
            JenisUsaha::create([
                'nama' => $ju->nama
            ]);
        }

        $lamaUsaha = json_decode(File::get("database/seeds/data/lama-usaha.json"));
        foreach ($lamaUsaha as $lu) {
            LamaUsaha::create([
                'nama' => $lu->nama
            ]);
        }

        $legalitas = json_decode(File::get("database/seeds/data/legalitas.json"));
        foreach ($legalitas as $l) {
            Legalitas::create([
                'nama' => $l->nama
            ]);
        }

        $modal = json_decode(File::get("database/seeds/data/modal.json"));
        foreach ($modal as $m) {
            Modal::create([
                'nama' => $m->nama
            ]);
        }
    }
}
