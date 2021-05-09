<?php

namespace App\Exports;

use App\Model\Umkm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SemuaUMKM implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        return Umkm::all();
    }

    public function headings(): array
    {
        return [
            'NIB',
            'Nama Usaha',
            'Nama Pemilik',
            'NPWP',
            'Alamat Usaha',
            'Legalitas',
            'Jenis Usaha',
            'Lama Usaha',
            'Modal',
            'Tahun Pendataan',
            'Diterima Pada '
        ];
    }

    public function map($umkm): array
    {
        $legalitas = '';
        foreach ($umkm->legalitas as $leg) {
            $legalitas .= ' '.$leg->nama;
        }

        return [
            $umkm->nib,
            $umkm->nama_usaha,
            $umkm->user->nama,
            $umkm->npwp,
            $umkm->alamat->detail .", Desa ".$umkm->alamat->desa->nama.", Kecamatan ".$umkm->alamat->kecamatan->nama,
            $legalitas,
            $umkm->jenisUsaha->nama,
            $umkm->lamaUsaha->nama,
            $umkm->modal->nama,
            $umkm->tahun_pendataan,
            $umkm->diterima_pada
        ];
    }
}