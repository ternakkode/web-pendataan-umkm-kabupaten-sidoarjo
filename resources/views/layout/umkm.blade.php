<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>@yield('title') | Klinik UMKM Sidoarjo</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/61ea652ee7.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/panel/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/custom.css') }}" rel="stylesheet">
    @yield('css')

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-umkm sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('') }}">
                <img src="{{ asset('img/logo.svg') }}" class="img-fluid" alt="">
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('app/umkm/') }}">
                    <i class="fas fa-building"></i>
                    <span>Data Informasi Utama</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('app/umkm/edit') }}">
                    <i class="fas fa-edit"></i>
                    <span>Ubah Informasi Utama</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('app/umkm/produk') }}">
                    <i class="fas fa-cart-plus"></i>
                    <span>Produk</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="dropdown-item" href="{{ url('app') }}">
                                <i class="fas fa-arrow-left fa-sm fa-fw mr-2 text-gray-400"></i>
                                Kembali Ke Halaman User
                            </a>
                        </li>
                    </ul>

                </nav>
                <div class="container-fluid">
                    @yield('content')
                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Klinik Usaha Mikro Kabupaten Sidoarjo 2021</span>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @yield('modal')

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/panel/sb-admin-2.min.js') }}"></script>
    @yield('js')
</body>

</html>