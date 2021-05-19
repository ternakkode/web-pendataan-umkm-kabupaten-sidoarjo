@extends('layout.front', ['page' => 'produk'])
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
    @endsection