@extends('layout.user')
@section('title', 'Halaman Awal')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data UKM Anda</h1>
    <a href="{{ url('/umkm/new') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambahkan UMKM Baru
    </a>
</div>
@if (session('sucess_message'))
<div class="alert alert-success">
    {{ session('sucess_message') }}
</div>
@endif
<div class="row">
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
                                    @else
                                    <button class="btn btn-danger btn-sm font-weight-bold mb-1 ml-1" disabled style="font-size: 10px">PENDING</button>
                                    @endif
                                </div>
                                @if ((bool) $u->telah_diterima)
                                <!-- TODO: buat route handlernya -->
                                <form method="post" action="{{ url('app/umkm/authorize') }}"> 
                                    @csrf
                                    <input type="hidden" name="id_umkm" value="{{ $u->id }}">
                                    <button type="submit" class="btn btn-primary w-100 mt-2">Akses Panel UMKM</button>
                                </form>
                                @else
                                    <a href="#" class="btn btn-primary w-100 mt-2 disabled">UMKM Belum Diterima</a>
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