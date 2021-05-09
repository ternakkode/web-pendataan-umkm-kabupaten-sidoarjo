<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Masuk | Klinik UMKM Sidoarjo</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/61ea652ee7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <section class="transparent-header">
        <a href="/">
            <img src="{{ asset('img/logo-warna.svg') }}" alt="" class="logo-header img-fluid">
        </a>
    </section>
    <section class="register-page auth-page">
        <div class="container">
            <div class="title-wrapper text-center">
                <h1 class="title upper-title">Selamat Datang Di</h1>
                <h1 class="title under-title">Klinik Usaha Mikro <span class="title-daerah">Kabupaten Sidoarjo</span></h1>
                <p class="text-muted">Silahkan masuk untuk gunakan app ini</p>
            </div>
            <div class="form-wrapper">
            <form method="post" action="{{ url('login') }}">
                @csrf
                <input type="hidden" name="role" value="admin">
                    <div class="row mt-5">
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas input-icon fa-lg fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="username" id="form_username" placeholder="Masukkan username anda">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas input-icon fa-lg fa-key"></i></div>
                                    </div>
                                    <input type="password" class="form-control" name="password" id="form_password" placeholder="Masukkan password anda">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-wrapper text-right mt-5">
                        <button class="btn btn-lg btn-light mr-3 text-secondary">Batalkan</button>
                        <button class="btn btn-lg btn-warning text-white">Masuk</button>
                    </div>
                    <div class="alredy-login-wrapper mt-4">
                        <p class="text-secondary">Belum punya akun ? <a class="font-weight-bold text-dark" href="{{ url('app/register') }}">Buat Sekarang Juga</p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if ($errors->any())
    <script type="text/javascript">
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ $errors->all()[0] }}'
        })
    </script>
    @elseif (session('success_message'))
    <script type="text/javascript">
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{session('success_message') }}'
        })
    </script>
    @elseif (session('failed_message'))
    <script type="text/javascript">
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{session('failed_message') }}'
        })
    </script>
    @endif
</body>

</html>