@extends('layout.front')
@section('title', 'Detail Produk')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
@endsection
@section('content')
<div class="detail-produk">
    <div class="secondary-hero">
        <div class="title-wrapper text-center">
            <h1 class="font-weight-bold secondary-hero-main-title">Detail Produk</h1>
            <p>Halaman Awal / Detail Produk</p>
        </div>
    </div>
    <div class="container pb-5">
        <div class="informasi-produk-wrapper row pt-5 pb-5">
            <div class="col-md-6 order-md-1 product-image-wrapper">
                <img src="{{ url('img/detail-produk-demo.png') }}" class="product-image-main img-fluid" alt="">
            </div>
            <div class="col-md-6 order-md-3">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="{{ url('img/detail-produk-demo.png') }}">
                    </div>
                    <div class="item">
                        <img src="{{ url('img/demo-profile.jpg') }}">
                    </div>
                    <div class="item">
                        <img src="{{ url('img/detail-produk-demo.png') }}">
                    </div>
                    <div class="item">
                        <img src="{{ url('img/demo-profile.jpg') }}">
                    </div>
                    <div class="item">
                        <img src="{{ url('img/detail-produk-demo.png') }}">
                    </div>
                    <div class="item">
                        <img src="{{ url('img/demo-profile.jpg') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6 order-md-2 product-information-wrapper">
                <h1 class="product-title font-weight-bold">Telur Pitan</h1>
                <h5 class="product-price">Rp. 13.000</h5>
                <p class="product-category"><span class="font-weight-bold product-category-title">Kategori : </span>
                    Makanan & Minuman</p>
                <p class="product-description-title font-weight-bold">Deskripsi : </p>
                <p class="product-description-detail text-muted">
                    Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                    auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet lorem quis
                    bibendum auctor, nisi elit consequat
                    Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                    auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet lorem quis
                    bibendum auctor, nisi elit consequat
                    Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                    auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet lorem quis
                    bibendum auctor, nisi elit consequat
                    Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                    auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet lorem quis
                    bibendum auctor, nisi elit consequat
                    Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                    auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet lorem quis
                    bibendum auctor, nisi elit consequat
                    Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                    auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet lorem quis
                    bibendum auctor, nisi elit consequat
                </p>
            </div>
        </div>
        <div class="card shadow-sm umkm-information">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <p class="font-weight-bold">CV KARYA ANAK BANGSA</p>
                        <a href="" class="btn btn-sm btn-outline-secondary btn-ke-toko"><i class="fas fa-store"></i>
                            Kunjungi Toko</a>
                    </div>
                    <div class="col-md-1 divider d-none d-sm-block">
                    </div>
                    <div class="col-md-8">
                        <div class="row umkm-information-detail">
                            <div class="col-md-3 font-weight-bold umkm-information-detail-title">
                                Nama Pemilik
                            </div>
                            <div class="col-md-9 umkm-information-detail-description">
                                Naufal Rinaldi
                            </div>
                            <div class="col-md-3 font-weight-bold umkm-information-detail-title">
                                Jenis Usaha
                            </div>
                            <div class="col-md-9 umkm-information-detail-description">
                                Makanan Minuman
                            </div>
                            <div class="col-md-3 font-weight-bold umkm-information-detail-title">
                                Alamat Usaha
                            </div>
                            <div class="col-md-9  umkm-information-detail-description">
                                Jl Pasar Buduran Rt 09 Rw 04 Kecamatan Buduran
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        margin: 10,
        responsive: {
            0: {
                items: 6
            },
            600: {
                items: 6
            },
            1000: {
                items: 6
            }
        }
    })

    $('.owl-carousel').on('click', '.item', function () {
        let imageUrl = $(this).find('img').attr('src');
        $('.product-image-main').attr('src', imageUrl);
    })
</script>
@endsection