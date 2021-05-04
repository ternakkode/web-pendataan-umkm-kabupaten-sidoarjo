@extends('layout.admin')
@section('title', 'Detail UMKM')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail UMKM</h6>
    </div>
    <div class="card-body text-dark px-5">
        <div class="wrapper-detail-user mb-4">
            <h3>Detail User</h3>
            <hr>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Nama
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->nama }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    NIK
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->nik }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Email
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->email }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    No HP
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->no_hp }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Pendidikan
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->pendidikan_terakhir }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Alamat
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->alamat->detail }}, Desa {{ $umkm->user->alamat->desa->nama }}, Kecamatan
                    {{ $umkm->user->alamat->kecamatan->nama }}
                </div>
            </div>
        </div>
        <div class="wrapper-detail-umkm">
            <h3>Detail UMKM</h3>
            <hr>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    NIB
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->nib }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Nama Usaha
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->nama_usaha }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Nama Pemilik
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->nama }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    NPWP
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->npwp }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Alamat Usaha
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->alamat->detail }}, Desa {{ $umkm->alamat->desa->nama }}, Kecamatan
                    {{ $umkm->alamat->kecamatan->nama }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Legalitas
                </div>
                <div class="col-md-10 col-9">
                    : @foreach($umkm->legalitas as $legalitas) {{ $legalitas->nama }} @endforeach
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Jenis Usaha
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->jenisUsaha->nama }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Lama Usaha
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->lamaUsaha->nama }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Modal
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->modal->nama }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Tahun Pendataan
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->tahun_pendataan }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Diterima Pada 
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->diterima_pada }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection