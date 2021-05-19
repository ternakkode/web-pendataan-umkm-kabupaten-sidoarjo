@extends('layout.front', ['page' => 'data'])
@section('title', 'Detail UMKM')
@section('content')
<div class="detail-umkm">
    <div class="secondary-hero">
        <div class="title-wrapper text-center">
            <h1 class="font-weight-bold secondary-hero-main-title">Detail UMKM</h1>
            <p>Halaman Awal / Detail UMKM</p>
        </div>
    </div>

    <div class="container-fluid informasi-umkm">
        <div class="card mr-sm-5 ml-sm-5 mt-5">
            <div class="card-header">
                <h3 class="font-weight-bold">{{ $umkm->nama_usaha }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card umkm-owner-information-card">
                            <div class="card-body tex-center">
                                <div class="profile-image-wrapper text-center">
                                    <img class="rounded-circle img-thumbnail"
                                        src="{{ url(profile_image_link($umkm->user->foto_profil)) }}">
                                </div>
                                <div class="profile-information-wrapper font-weight-bold">
                                    <div class="profile-information-detail">
                                        <div class="profile-information-detail-title">
                                            Nama
                                        </div>
                                        <div class="profile-information-detail-description">
                                            {{ $umkm->user->nama }}
                                        </div>
                                    </div>
                                    <div class="profile-information-detail">
                                        <div class="profile-information-detail-title">
                                            NIK
                                        </div>
                                        <div class="profile-information-detail-description">
                                            {{ $umkm->user->nik }}
                                        </div>
                                    </div>
                                    <div class="profile-information-detail">
                                        <div class="profile-information-detail-title">
                                            Pendidikan Terakhir
                                        </div>
                                        <div class="profile-information-detail-description">
                                            {{ strtoupper($umkm->user->pendidikan_terakhir) }}
                                        </div>
                                    </div>
                                    <div class="profile-information-detail">
                                        <div class="profile-information-detail-title">
                                            No Telefon
                                        </div>
                                        <div class="profile-information-detail-description">
                                            {{ $umkm->user->no_hp }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 mt-3 font-weight-bold">
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                NIB
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                {{ $umkm->nib }}
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Nama Usaha
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                {{ $umkm->nama_usaha }}
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Nama Pemilik
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                {{ $umkm->user->nama }}
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                NPWP
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                {{ $umkm->npwp }}
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Alamat Usaha
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                {{ $umkm->alamat->detail }}, Desa {{ $umkm->alamat->desa->nama }}, Kecamatan
                                {{ $umkm->alamat->kecamatan->nama }}
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Legalitas
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                @foreach($umkm->legalitas as $legalitas) {{ $legalitas->nama }} @endforeach </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Jenis Usaha
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                {{ $umkm->jenisUsaha->nama }}
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Lama Usaha
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                {{ $umkm->lamaUsaha->nama }}
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Modal
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                {{ $umkm->modal->nama }}
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Tahun Pendataan
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                {{ $umkm->tahun_pendataan }}
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Diterima Pada
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                {{ $umkm->diterima_pada }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="daftar-produk">
    <div class="container-fluid">
        <div class="row pl-sm-5 pr-sm-5 mt-5">
            <div class="col-md-10">
                <form class="search-container">
                    <input type="text" name="keyword" id="search-bar" placeholder="Nama Produk">
                    <a href="#" onclick="$(this).closest('form').submit()"><img class="search-icon"
                            src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
                </form>
            </div>
            <div class="col-md-2">
                <div class="btn-group w-100">
                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('umkm') }}">Semua Jenis Usaha</a>
                        @foreach($jenisUsaha as $j)
                        <a class="dropdown-item" href="?jenis_usaha={{ $j->id }}">{{ $j->nama }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center product-list pl-sm-5 pr-sm-5 mr-0 ml-0">
            @foreach ($paginatedProduk as $produk)
            <div class="col-md-3 mb-3 text-center">
                <a href="{{ url('produk/'.$produk->id) }}">
                    <div class="card shadow-sm mx-5 mx-sm-0">
                        @foreach($produk->foto as $foto)
                        @if($foto->foto_utama)
                        <img class="card-img-top" src="{{ product_image_link($foto->url) }}" alt="Card image cap">
                        @endif
                        @endforeach
                        <div class="card-body font-weight-bold">
                            <p class="card-title">{{ $produk->nama }}</p>
                            <p class="card-text">Rp. {{ format_angka($produk->harga) }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="pagination-wrapper justify-content-center d-flex mt-5 pb-3">
            {{ $paginatedProduk->appends(request()->query())->links() }}
        </div>
    </div>
</div>
</div>
@endsection