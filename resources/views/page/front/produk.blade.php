@extends('layout.front')
@section('title', 'Daftar Produk')
@section('content')
<div class="daftar-produk">
    <div class="secondary-hero">
        <div class="title-wrapper text-center">
            <h1 class="font-weight-bold secondary-hero-main-title">Produk UMKM</h1>
            <p>Halaman Awal / Produk UMKM</p>
        </div>
    </div>

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
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=2">2</a></li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=3">3</a></li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=4">4</a></li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=5">5</a></li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=6">6</a></li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=7">7</a></li>
                <li class="page-item"><a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=8">8</a></li>
                <li class="page-item">
                    <a class="page-link" href="https://rajabrawijaya.ub.ac.id/ukm?page=2" rel="next"
                        aria-label="Next &raquo;">&rsaquo;</a>
                </li>
            </ul>
        </div>
    </div>
    @endsection