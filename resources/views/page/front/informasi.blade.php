@extends('layout.front', ['page' => 'informasi'])
@section('title', 'Data Informasi')
@section('content')
<div class="blog">
    <div class="secondary-hero">
        <div class="title-wrapper text-center">
            <h1 class="font-weight-bold secondary-hero-main-title">Informasi</h1>
            <p>Halaman Awal / Informasi</p>
        </div>
    </div>

    <div class="daftar-blog">
        <div class="container-fluid">
            <div class="row justify-content-center blog-list pl-sm-5 pr-sm-5 mt-5 mr-0 ml-0">
                @foreach($paginatedInformasi as $informasi)
                <div class="col-md-4 mb-3">
                    <a href="{{ url('informasi/'.$informasi->id) }}" class="blog-card"
                        style="background-image: url({{ information_image_link($informasi->foto) }})">
                        <div class="blog-card-text">
                            <h2 class="font-weight-bold">{{ $informasi->judul }}</h2>
                            <span class="date text-muted">{{ tgl_indo($informasi->terbit_pada) }}</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="pagination-wrapper justify-content-center d-flex mt-5 pb-3">
                {{ $paginatedInformasi->links() }}
            </div>
        </div>
    </div>
</div>
@endsection