<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')

    <title>@yield('title') | Admin Klinik UMKM Sidoarjo</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/61ea652ee7.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('css/panel/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/custom.css') }}" rel="stylesheet">
    @yield('css')

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-umkm sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <img src="{{ asset('img/logo.svg') }}" class="img-fluid" alt="">
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('backoffice') }}">
                    <i class="fas fa-home"></i>
                    <span>Halaman Awal</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Fitur Utama
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUMKM"
                    aria-expanded="true" aria-controls="collapseForm">
                    <i class="fas fa-fw fa-store"></i>
                    <span>UMKM</span>
                </a>
                <div id="collapseUMKM" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('backoffice/umkm') }}">Semua UMKM</a>
                        <a class="collapse-item" href="{{ url('backoffice/umkm?status=pending') }}">UMKM Pending</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('backoffice/informasi') }}">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Informasi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('backoffice/admin') }}">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Pengurus</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Lain - Lain
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
                    aria-expanded="true" aria-controls="collapseForm">
                    <i class="fas fa-fw fa-copy"></i>
                    <span>Data Form</span>
                </a>
                <div id="collapseForm" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('backoffice/jenis-usaha') }}">Jenis Usaha</a>
                        <a class="collapse-item" href="{{ url('backoffice/lama-usaha') }}">Lama Usaha</a>
                        <a class="collapse-item" href="{{ url('backoffice/legalitas') }}">Legalitas</a>
                        <a class="collapse-item" href="{{ url('backoffice/modal') }}">Modal</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDaerah"
                    aria-expanded="true" aria-controls="collapseDaerah">
                    <i class="fas fa-fw fa-map-marker-alt"></i>
                    <span>Daerah</span>
                </a>
                <div id="collapseDaerah" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ url('backoffice/kecamatan') }}">Kecamatan</a>
                        <a class="collapse-item" href="{{ url('backoffice/desa') }}">Desa</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Keluar
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

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    
                    <form method="POST" action="{{ url('logout')}}" class="d-inline">
                            @csrf
                            <button class="btn btn-danger">Yakin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @yield('modal')

    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/panel/sb-admin-2.min.js') }}"></script>
    @yield('js')
</body>

</html>