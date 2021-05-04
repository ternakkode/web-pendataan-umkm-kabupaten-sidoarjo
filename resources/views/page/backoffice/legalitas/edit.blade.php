@extends('layout.admin')
@section('title', 'Ubah Data Legalitas')
@section('content')
<form method="POST" action="{{ url('backoffice/legalitas/' .$legalitas->id) }}">
    @method('PUT')
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Data Legalitas</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="nama" id="form_nama" value="{{ $legalitas->nama }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navigation text-center">
                <button type="submit" class="btn btn-success w-100 font-weight-bold">SIMPAN</button>
            </div>
        </div>
    </div>
</form>
@endsection