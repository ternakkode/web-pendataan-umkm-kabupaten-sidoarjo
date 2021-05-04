@extends('layout.admin')
@section('title', 'Detail Informasi')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Informasi</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 cover">
                <img src="{{ information_image_link($informasi->foto) }}" class="img-fluid">
            </div>
            <div class="col-12 text-center mt-3">
                <h1 class="title font-weight-bold text-dark">{{ $informasi->judul }}</h1>
            </div>
            <div class="col-12 mt-3 text-justify text-dark">
                {!! $informasi->deskripsi !!}
            </div>
        </div>
    </div>
</div>
@endsection