@extends('layout.front')
@section('title', 'Halaman Awal')
@section('content')
<div class="landing-page">
    <div class="hero row mx-0">
        <div class="col-md-6 my-md-auto pl-sm-5">
            <div class="hero-title">
                <h1 class="font-weight-bold first-title">Klinik Usaha Mikro</h1>
                <h1 class="font-weight-bold second-title">Kabupaten Sidoarjo</h1>
            </div>
            <p class="hero-description">Lebih dari {{ format_angka($totalUmkm) }} usaha mikro yang telah terdaftar di Klinik Usaha Mikro
                Kabupaten
                Sidoarjo.</p>
            <a href="{{ url('app/register') }}" class="btn btn-register">Daftar Sekarang</a>
        </div>
        <div class="col-md-6 d-none d-sm-block">
            <div class="image-wrapper">
                <img src="{{ url('img/hero-image.svg') }}" alt="hero-image" class="hero-image" width="75%">
            </div>
        </div>
    </div>
    <div class="program-kami row mx-0">
        <div class="col-md-6 my-md-auto pl-sm-5 order-md-2 mb-4">
            <h1 class="font-weight-bold">Program Kami</h1>
            <hr>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellen
                pretium quis, sem. Nulla consequat massa quis enim.
            </p>
            <a href="{{ url('tentang-kami') }}" class="btn btn-cta">Pelajari Selengkapnya</a>
        </div>
        <div class="col-md-6 pl-sm-5 pr-sm-5 pl-1 pr-1 order-md-1">
            <div class="row">
                <div class="col-md-6  mb-1 mb-md-5">
                    <div class="card card-program-kami card-type-one">
                        <div class="card-body text-center">
                            <h5 class="card-title">KONSULTASI</h5>
                            <p class="card-text">Layanan konsultasi untuk meningkatkan pemasaran produk UMKM di
                                Sidoarjo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  mt-md-5">
                    <div class="card card-program-kami card-type-two">
                        <div class="card-body text-center">
                            <h5 class="card-title">PELATIHAN</h5>
                            <p class="card-text">Layanan pelatihan untuk meningkatkan pemasaran produk UMKM di Sidoarjo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  mb-md-5">
                    <div class="card card-program-kami card-type-one">
                        <div class="card-body text-center">
                            <h5 class="card-title">PENDAMPINGAN</h5>
                            <p class="card-text">Layanan Informasi Bisnis bagi usaha mikro serta peningkatan kapasitas
                                pengusaha mikro di sidoarjo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  mt-md-5">
                    <div class="card card-program-kami card-type-two">
                        <div class="card-body text-center">
                            <h5 class="card-title">PEMBIAYAAN</h5>
                            <p class="card-text">Bantuan akses pembiayaan serta layanan konsultasi terkait pembiayaan
                                bagi
                                pengusaha mikro di Sidoarjo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="produk-umkm mx-0 pt-5">
        <div class="title-wrapper text-center">
            <h1 class="font-weight-bold">Produk UMKM</h1>
            <hr style="width:10%;border-width: 1.5px;">
        </div>
        <div class="row justify-content-center product-list pl-sm-5 pr-sm-5 mt-5 mr-0 ml-0">
            @foreach ($produkRandom as $produk)
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

        <div class="cta-wrapper mt-3 mb-5 text-center">
            <a href="{{ url('produk') }}" class="btn btn-cta">Lihat Semua Produk</a>
        </div>
    </div>
    <div class="blog mx-0 pt-5">
        <div class="title-wrapper text-center">
            <h1 class="font-weight-bold">Informasi UMKM</h1>
            <hr style="width:10%;border-width: 1.5px;">
        </div>
        <div class="row justify-content-center blog-list pl-sm-5 pr-sm-5 mt-5 mr-0 ml-0">
            @foreach($informasiTerbaru as $informasi)
            <div class="col-md-4 mb-3">
                <a href="" class="blog-card"
                    style="background-image: url({{ information_image_link($informasi->foto) }})">
                    <div class="blog-card-text">
                        <h2 class="font-weight-bold">{{ $informasi->judul }}</h2>
                        <span class="date text-muted">{{ tgl_indo($informasi->terbit_pada) }}</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="cta-wrapper mt-3 pb-5 text-center">
            <a href="{{ url('informasi') }}" class="btn btn-cta">Lihat Semua Informasi</a>
        </div>
    </div>
</div>
@endsection
@section('js')
@if (session('success_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{session('
        success_message ') }}'
    })
</script>
@elseif (session('failed_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{session('
        failed_message ') }}'
    })
</script>
@endif
@endsection