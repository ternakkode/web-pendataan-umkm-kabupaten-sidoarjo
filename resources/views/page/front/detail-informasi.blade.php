@extends('layout.front', ['page' => 'informasi'])
@section('title', 'Detail Informasi')
@section('content')
<div class="secondary-hero">
    <div class="title-wrapper text-center">
        <h1 class="font-weight-bold secondary-hero-main-title">Detail Informasi</h1>
        <p>Halaman Awal / Detail Informasi</p>
    </div>
</div>
<div class="detail-informasi container pt-5 pb-5">
    <div class="informasi-header-wrapper text-center mb-5">
        <h1 class="font-weight-bold">{{ $informasi->judul }}</h1>
        <p class="font-weight-bold"><span class="text-muted"> By : </span> {{ $informasi->admin->nama }}</p>
        <img src="{{ information_image_link($informasi->foto) }}" class="img-fluid" alt="" style="max-height:70vh">
    </div>
    <div class="information-description">{!! $informasi->deskripsi !!}</div>
</div>
@endsection