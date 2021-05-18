@extends('layout.front')
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
                <h3 class="font-weight-bold">CV KARYA ANAK BANGSA</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card umkm-owner-information-card">
                            <div class="card-body tex-center">
                                <div class="profile-image-wrapper text-center">
                                    <img class="rounded-circle img-thumbnail" src="{{ url('img/demo-profile.jpg') }}">
                                </div>
                                <div class="profile-information-wrapper font-weight-bold">
                                    <div class="profile-information-detail">
                                        <div class="profile-information-detail-title">
                                            Nama
                                        </div>
                                        <div class="profile-information-detail-description">
                                            Naufal Rinaldi
                                        </div>
                                    </div>
                                    <div class="profile-information-detail">
                                        <div class="profile-information-detail-title">
                                            NIK
                                        </div>
                                        <div class="profile-information-detail-description">
                                            17668637162321
                                        </div>
                                    </div>
                                    <div class="profile-information-detail">
                                        <div class="profile-information-detail-title">
                                            Pendidikan Terakhir
                                        </div>
                                        <div class="profile-information-detail-description">
                                            SMA
                                        </div>
                                    </div>
                                    <div class="profile-information-detail">
                                        <div class="profile-information-detail-title">
                                            No Telefon
                                        </div>
                                        <div class="profile-information-detail-description">
                                            08983840564
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
                                 1234567890
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Nama Usaha
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                 Bakso Pa Nanang
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Nama Pemilik
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                 Demo User
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                NPWP
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                 09.254.294.3-407.000
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Alamat Usaha
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                 DISINI SENANG DISANA SENANG DIMANA MANA HATIKU SENANG, Desa Bakalan Wringinpitu,
                                Kecamatan
                                Balongbendo
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Legalitas
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                 P-IRT HALAL MERK BPPOM </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Jenis Usaha
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                 Makanan Minuman
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Lama Usaha
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                 Diatas 5 Tahun
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Modal
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                 &gt; 50 Jt
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Tahun Pendataan
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                 2021
                            </div>
                        </div>
                        <div class="row form-data umkm-information-detail-wrapper">
                            <div class="col-md-2 col-3 umkm-information-detail-title">
                                Diterima Pada
                            </div>
                            <div class="col-md-10 col-9 umkm-information-detail-description">
                                 2021-05-10
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
                    <input type="text" id="search-bar" placeholder="What can I help you with today?">
                    <a href="#"><img class="search-icon"
                            src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
                </form>
            </div>
            <div class="col-md-2">
                <div class="btn-group w-100">
                    <button class="btn btn-primary btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </button>
                    <div class="dropdown-menu">
                        ...
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center product-list pl-sm-5 pr-sm-5 mr-0 ml-0">
            <div class="col-md-3 mb-3 text-center">
                <a href="">
                    <div class="card shadow-sm mx-5 mx-sm-0">
                        <img class="card-img-top" src="{{ url('img/produk-demo-1.png') }}" alt="Card image cap">
                        <div class="card-body font-weight-bold">
                            <p class="card-title">Fresh Detox Blueberry</p>
                            <p class="card-text">Rp. 30.000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3 text-center">
                <a href="">
                    <div class="card shadow-sm mx-5 mx-sm-0">
                        <img class="card-img-top" src="{{ url('img/produk-demo-1.png') }}" alt="Card image cap">
                        <div class="card-body font-weight-bold">
                            <p class="card-title">Fresh Detox Blueberry</p>
                            <p class="card-text">Rp. 30.000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3 text-center">
                <a href="">
                    <div class="card shadow-sm mx-5 mx-sm-0">
                        <img class="card-img-top" src="{{ url('img/produk-demo-1.png') }}" alt="Card image cap">
                        <div class="card-body font-weight-bold">
                            <p class="card-title">Fresh Detox Blueberry</p>
                            <p class="card-text">Rp. 30.000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3 text-center">
                <a href="">
                    <div class="card shadow-sm mx-5 mx-sm-0">
                        <img class="card-img-top" src="{{ url('img/produk-demo-1.png') }}" alt="Card image cap">
                        <div class="card-body font-weight-bold">
                            <p class="card-title">Fresh Detox Blueberry</p>
                            <p class="card-text">Rp. 30.000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3 text-center">
                <a href="">
                    <div class="card shadow-sm mx-5 mx-sm-0">
                        <img class="card-img-top" src="{{ url('img/produk-demo-1.png') }}" alt="Card image cap">
                        <div class="card-body font-weight-bold">
                            <p class="card-title">Fresh Detox Blueberry</p>
                            <p class="card-text">Rp. 30.000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3 text-center">
                <a href="">
                    <div class="card shadow-sm mx-5 mx-sm-0">
                        <img class="card-img-top" src="{{ url('img/produk-demo-1.png') }}" alt="Card image cap">
                        <div class="card-body font-weight-bold">
                            <p class="card-title">Fresh Detox Blueberry</p>
                            <p class="card-text">Rp. 30.000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3 text-center">
                <a href="">
                    <div class="card shadow-sm mx-5 mx-sm-0">
                        <img class="card-img-top" src="{{ url('img/produk-demo-1.png') }}" alt="Card image cap">
                        <div class="card-body font-weight-bold">
                            <p class="card-title">Fresh Detox Blueberry</p>
                            <p class="card-text">Rp. 30.000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3 text-center">
                <a href="">
                    <div class="card shadow-sm mx-5 mx-sm-0">
                        <img class="card-img-top" src="{{ url('img/produk-demo-1.png') }}" alt="Card image cap">
                        <div class="card-body font-weight-bold">
                            <p class="card-title">Fresh Detox Blueberry</p>
                            <p class="card-text">Rp. 30.000</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="pagination-wrapper justify-content-center d-flex mt-5 pb-3">
            <ul class="pagination">

                <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
                <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=2">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=3">3</a>
                </li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=4">4</a>
                </li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=5">5</a>
                </li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=6">6</a>
                </li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=7">7</a>
                </li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=8">8</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=2" rel="next"
                        aria-label="Next &raquo;">&rsaquo;</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
@endsection