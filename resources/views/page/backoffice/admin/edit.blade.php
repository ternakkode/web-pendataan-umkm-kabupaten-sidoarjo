@extends('layout.admin')
@section('title', 'Ubah Data Pengurus')
@section('content')
<form method="POST" action="{{ url('backoffice/admin/' .$admin->id) }}">
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
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Data Pengurus</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="nama" id="form_nama" value="{{ $admin->nama }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="form_username" value="{{ $admin->username }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="form_password">
                                <small id="passwordHelp" class="form-text text-muted">Kosongi jika tidak ingin merubah password yang ada.</small>
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