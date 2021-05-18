<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Registrasi Akun Baru | Klinik UMKM Sidoarjo</title>

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
                <h1 class="title upper-title">Registrasi Akun</h1>
                <h1 class="title under-title">Klinik Usaha Mikro</h1>
                <p class="text-muted">Buat akun anda sekarang juga</p>
            </div>
            <div class="form-wrapper">
                <form method="POST">
                    @csrf
                    <div class="row mt-5">
                    <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far input-icon fa-lg fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="nama" id="form_nama" placeholder="Masukkan nama anda sesuai KTP" value="{{ old('nama') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="far input-icon fa-lg fa-envelope"></i></div>
                                    </div>
                                    <input type="email" class="form-control" name="email" id="form_email" placeholder="Masukkan email anda" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas input-icon fa-lg fa-id-card"></i></div>
                                    </div>
                                    <input type="text" class="form-control" name="username" id="form_username" placeholder="Masukkan username anda" value="{{ old('password') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas input-icon fa-lg fa-key"></i></div>
                                    </div>
                                    <input type="password" class="form-control" name="password" id="form_password" placeholder="Masukkan password anda">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas input-icon fa-lg fa-key"></i></div>
                                    </div>
                                    <input type="password" class="form-control" name="password_confirmation" id="form_password_confirmation" placeholder="Masukkan ulang password anda">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-wrapper text-right mt-4">
                        <a href="{{ url('/') }}" class="btn btn-lg btn-light mr-3 text-secondary">Batalkan</a>
                        <button class="btn btn-lg btn-warning text-white">Lanjutkan</button>
                    </div>
                    <div class="alredy-login-wrapper mt-4">
                        <p class="text-secondary">Sudah punya akun ? <a class="font-weight-bold text-dark" href="{{ url('app/login') }}">Masuk Sekarang Juga</p>
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
    @endif
</body>

</html>