<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')
    
    <title>@yield('title') | Klinik UMKM Sidoarjo</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/61ea652ee7.js" crossorigin="anonymous"></script>

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')

</head>

<body>
    <section class="header">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.svg') }}" alt="" class="img-fluid w-75">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerCollapse"
                aria-controls="navbarTogglerCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <div class="animated-icon"><span></span><span></span><span></span></div>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerCollapse">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-sm fa-user mr-1"></i> Masuk</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-register">Daftar Sekarang</button>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <section class="content">
        @yield('content')
    </section>

    <section class="footer">
        <div class="container-fluid footer-one">
            <div class="row">
                <div class="col-md-4 d-flex justify-content-center">
                    <img src="{{ asset('img/sidoarjo-logo.svg') }}" alt="Logo Kabupaten Sidoarjo" width="70%">
                </div>
                <div class="col-md-4 d-md-flex justify-content-center">
                    <div class="wrapper">
                        <div class="title">
                            <h3>Menu</h3>
                            <hr class="divider">
                        </div>
                        <div class="footer-sitelink">
                            <div class="sitelink-wrapper">
                                <ul class="sitelink">
                                    <li>
                                        <a href="#">
                                            Beranda
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Data
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Tentang Kami
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="social-media-wrapper">
                                <ul class="social-media">
                                    <li>
                                        <a href="#">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x fa-wrapper"></i>
                                                <i class="fas fa-globe fa-stack-1x"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x fa-wrapper"></i>
                                                <i class="fab fa-facebook fa-stack-1x"></i>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fa-stack">
                                                <i class="fas fa-circle fa-stack-2x fa-wrapper"></i>
                                                <i class="fab fa-instagram fa-stack-1x"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-md-flex justify-content-center">
                    <div class="wrapper">
                        <div class="title">
                            <h3>Alamat</h3>
                            <hr class="divider">
                        </div>
                        <div class="company-information">
                            <div class="company-location-wrapper">
                                <p class="company-name font-weight-bold">
                                    Dinas Koperasi dan Usaha Mikro
                                    Kabupaten Sidoarjo
                                </p>
                                <p class="company-address">
                                    Jl. Jaksa Agung Suprapto Raya Suprapto No.9, Sidoklumpuk, Sidokumpul, Kec. Sidoarjo,
                                    Kabupaten Sidoarjo, Jawa Timur.
                                </p>
                            </div>
                            <p class="company-telephone">
                                No Telepon : (031) 8921220
                            </p>
                            <p class="company-operational-hours">
                                Jam Operasional : 08.00 - 14.00
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-end font-weight-bold">
            @ Copyright 2021 | Dinas Koperasi dan Usaha Mikro Kabupaten Sidoarjo. Powered by Naufal Rinaldi.
        </div>
    </section>
    
    @yield('modal')
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function () {
            $('.navbar-toggler').on('click', function () {
                $('.animated-icon').toggleClass('open');
            });
        });
    </script>
    @yield('js')
</body>

</html>