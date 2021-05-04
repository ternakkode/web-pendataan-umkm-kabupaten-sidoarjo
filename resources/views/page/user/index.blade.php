@extends('layout.user')
@section('title', 'Halaman Awal')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data UKM Anda</h1>
    <a href="{{ url('app/umkm/new') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambahkan UMKM Baru
    </a>
</div>
<div class="row" style="min-height:65vh">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">UMKM</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($umkm as $u)
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="title-wrapper">
                                    <h5 class="d-inline">{{ $u->nama_usaha }}</h5>
                                    @if ((bool) $u->telah_diterima)
                                    <button class="btn btn-success btn-sm font-weight-bold mb-1 ml-1" disabled style="font-size: 10px">AKTIF</button>
                                    @elseif(empty($u->diterima_pada))
                                    <button class="btn btn-warning btn-sm font-weight-bold mb-1 ml-1" disabled style="font-size: 10px">PENDING</button>
                                    @else
                                    <button class="btn btn-danger btn-sm font-weight-bold mb-1 ml-1" disabled style="font-size: 10px">DITOLAK</button>
                                    @endif
                                </div>
                                @if ((bool) $u->telah_diterima)
                                <form method="post" action="{{ url('app/umkm/authorize') }}"> 
                                    @csrf
                                    <input type="hidden" name="id_umkm" value="{{ $u->id }}">
                                    <button type="submit" class="btn btn-primary w-100 mt-2">Akses Panel UMKM</button>
                                </form>
                                @elseif(empty($u->diterima_pada))
                                    <a href="#" class="btn btn-secondary w-100 mt-2 disabled">UMKM Belum Diterima</a>
                                @else
                                <a href="{{ url('app/umkm/pengajuan-ulang?id_umkm='.$u->id) }}" class="btn btn-warning w-100 mt-2">Ajukan Ulang</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
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
@endsection
