@extends('layout.front')
@section('title', 'Daftar UMKM')
@section('content')
<div class="data-umkm">
    <div class="secondary-hero">
        <div class="title-wrapper text-center">
            <h1 class="font-weight-bold secondary-hero-main-title">Data UMKM</h1>
            <p>Halaman Awal / Data UMKM</p>
            <div class="row">
                <div class="col">
                    <div class="card card-statistic">
                        <div class="card-body text-center">
                            <p class="font-weight-bold">Jumlah Total UMKM</p>
                            <h1>{{ format_angka($totalUmkm) }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-statistic">
                        <div class="card-body text-center">
                            <p class="font-weight-bold">Jumlah Jenis Usaha</p>
                            <h1>{{ format_angka($totalJenisUsaha) }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-4">
        <div class="page-wrapper">
            <div class="btn-group float-right">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Jenis Usaha
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ url('umkm') }}">Semua Jenis Usahas</a>
                        @foreach($jenisUsaha as $j)
                            <a class="dropdown-item" href="?jenis_usaha={{ $j->id }}">{{ $j->nama }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 pb-5">
        <div class="card">
            <div class="card-body">
                <table class="table" id="tabelUmkm">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NIB</th>
                            <th scope="col">Nama Usaha</th>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Alamat Rumah</th>
                            <th scope="col">Alamat Usaha</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($umkm as $key => $u)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $u->nib }}</td>
                            <td>{{ $u->nama_usaha }}</td>
                            <td>{{ $u->user->nama }}</td>
                            <td>{{ $u->user->alamat->detail }}, Desa {{ $u->user->alamat->desa->nama }}, Kecamatan
                    {{ $u->user->alamat->kecamatan->nama }}</td>
                            <td>{{ $u->alamat->detail }}, Desa {{ $u->alamat->desa->nama }}, Kecamatan
                    {{ $u->alamat->kecamatan->nama }}</td>
                            <td><a href="{{ url('umkm/'.$u->id) }}" class="btn btn-sm btn-primary" style="border-radius:10px">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#tabelUmkm').DataTable();
    });
</script>
@endsection