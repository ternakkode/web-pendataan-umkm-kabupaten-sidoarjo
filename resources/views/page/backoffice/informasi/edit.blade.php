@extends('layout.admin')
@section('title', 'Edit Informasi')
@section('content')
<form method="POST" action="{{ url('backoffice/informasi/'.$informasi->id) }}" enctype="multipart/form-data">
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
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Informasi</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Judul</label>
                                <input type="text" class="form-control" name="judul" id="form_judul" value="{{ $informasi->judul }}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="form_foto">
                                    <label class="custom-file-label" for="form_foto">Pilih Foto</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="form_deskripsi" rows="2">{{ $informasi->deskripsi }}</textarea>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkboxPublish" name="publish" @if ($informasi->telah_terbit) checked @endif>
                                <label class="form-check-label" for="checkboxPublish">Publikasikan Artikel</label>
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
@section('js')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    
    CKEDITOR.replace('deskripsi');
</script>
@endsection