<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
        p {
            margin-block-start: 0;
            margin-block-end: 0;
            letter-spacing: 0.3px;
        }

        p.header-dokumen-teks>span {
            display: inline-block;
            min-width: 120px;
        }

        .header-dokumen {
            margin-left: 0;
            margin-right: 0;
            border-width: 1px;
            border-style: solid;
            border-color: #dee2e6;
        }

        hr {
            background-color: black;
            border: 1.3px solid black;
        }

        .top-hr {
            margin: 25px;
        }
    </style>

    <title>Data {{ $umkm->nama_usaha }} - Klinik UMKM Sidoarjo</title>
</head>

<body>
    <div class="container-fluid pt-3">
        <img style="width:100px;margin-left: 20px;position: absolute;" alt="Logo"
            src="http://localhost:8000/img/logo-sidoarjo.png" />
        <h3 class="text-center font-weight-bold">
            PEMERINTAH KABUPATEN SIDOARJO<br>
        </h3>
        <h5 class="text-center font-weight-bold">DINAS KOPERASI DAN USAHA MIKRO</h5>
        <p class="text-center" style="line-height: 1.4;font-size: 0.9rem;">
            Jalan Jaksa Agung R. Suprapto No. 9 Telp. (0321) 8921220 Fax. (0321) 8921220 SIDOARJO 61218
        </p>
    </div>
    <hr class="top-hr">
    <div class="container pl-0 pr-0">
        <h4 class="text-center font-weight-bold" style="margin-top:70px;margin-bottom: 50px;">PROFIL USAHA PEDAGANG MIKRO</h4>
        <div class="wrapper-detail-user mb-4">
            <h3>Detail User</h3>
            <hr>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Nama
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->nama }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    NIK
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->nik }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Email
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->email }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    No HP
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->no_hp }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Pendidikan
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->pendidikan_terakhir }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Alamat
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->alamat->detail }}, Desa {{ $umkm->user->alamat->desa->nama }}, Kecamatan
                    {{ $umkm->user->alamat->kecamatan->nama }}
                </div>
            </div>
        </div>
        <div class="wrapper-detail-umkm">
            <h3>Detail UMKM</h3>
            <hr>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    NIB
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->nib }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Nama Usaha
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->nama_usaha }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Nama Pemilik
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->user->nama }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    NPWP
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->npwp }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Alamat Usaha
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->alamat->detail }}, Desa {{ $umkm->alamat->desa->nama }}, Kecamatan
                    {{ $umkm->alamat->kecamatan->nama }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Legalitas
                </div>
                <div class="col-md-10 col-9">
                    : @foreach($umkm->legalitas as $legalitas) {{ $legalitas->nama }} @endforeach
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Jenis Usaha
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->jenisUsaha->nama }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Lama Usaha
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->lamaUsaha->nama }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Modal
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->modal->nama }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Tahun Pendataan
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->tahun_pendataan }}
                </div>
            </div>
            <div class="row form-data">
                <div class="col-md-2 col-3 font-weight-bold">
                    Diterima Pada 
                </div>
                <div class="col-md-10 col-9">
                    : {{ $umkm->diterima_pada }}
                </div>
            </div>
        </div>
        <div class="row pb-4 pl-3" style="margin-top: 100px;">
            <div class="col-6">
            </div>
            <div class="col-6 text-center">
                <p class="footer-dokumen-teks" style="margin-bottom: 100px;">
                    <span class="font-weight-bold">Sidoarjo, {{ tgl_indo(date('Y-m-d')) }}<br>KEPALA DINAS KOPERASI DAN USAHA MIKRO</p>
                <p><span class="font-weight-bold"><u>MOHAMMAD EDI KURNIADI, ST., MM</u></span><br>
                    Pembina Tk.1<br>NIP. 19690605 199403 1 006</p>
            </div>
        </div>
    </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
        window.print();
    </script>
</body>

</html>