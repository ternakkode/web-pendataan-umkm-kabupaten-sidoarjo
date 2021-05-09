<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Verifikasi Akun | Klinik UMKM Sidoarjo</title>

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
    <section class="email-verification-page auth-page">
        <div class="container">
            <div class="title-wrapper text-center">
                <h1 class="title under-title">Verifikasi Email</h1>
            </div>
            <div class="img-wrapper text-center mt-5">
                <img class="img-fluid img-verification" src="{{ asset('img/email-verification.svg') }}">
            </div>
            <div class="detail-verification-wrapper text-center mt-5">
                <p class="font-weight-bold text-muted  mb-0">1. Anda akan menerima link verifikasi di e-mail saat anda mendaftar. Klik link tersebut
                    untuk mengkonfirmasi pendaftaran akun Anda untuk bisa lanjut mengakses website kami.</p>
                <p class="font-weight-bold text-muted">2. Jika anda belum menemerima link verifikasi di e-mail, <a class="font-weight-bold text-dark" href="{{ url('app/verification?resend=yes') }}">kirim ulang e-mail verifikasi. </a></p>
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

    @if (isset($message))
        @if($message['status'] == true)
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ $message['message'] }}'
            })
        </script>
        @else
        <script type="text/javascript">
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ $message['message'] }}'
            })
        </script>
        @endif
    @endif
</body>

</html>