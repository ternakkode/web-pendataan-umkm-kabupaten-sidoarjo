@extends('layout.admin')
@section('title', 'Buat Pengguna Baru')
@section('content')
<form method="POST" action="{{ url('backoffice/user') }}" enctype="multipart/form-data">
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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Pengguna Baru</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama">Email</label>
                                <input type="email" class="form-control" name="email" id="form_email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama">Username</label>
                                <input type="text" class="form-control" name="username" id="form_username">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="form_password">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="form_nama">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" class="form-control" name="nik" id="form_nik">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="number" class="form-control" name="no_hp" id="form_no_hp">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                <select class="form-control" name="pendidikan_terakhir" id="form_pendidikan_terakhir">
                                    <option selected disabled>Pilih Pendidikan Terakhir</option>
                                    <option value="sd">SD</option>
                                    <option value="smp">SMP</option>
                                    <option value="sma">SMA</option>
                                    <option value="diploma">DIPLOMA</option>
                                    <option value="s1">S1</option>
                                    <option value="s2">S2</option>
                                    <option value="s3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="foto_profil">Foto Profil</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto_profil"
                                        id="form_foto_profil">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control" name="kecamatan" id="form_kecamatan">
                                    <option selected disabled>Pilih Kecamatan</option>
                                    @foreach($kecamatan as $kec)
                                    <option value="{{ $kec->id }}">{{ $kec->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="desa">Desa</label>
                                <select class="form-control" name="desa" id="form_desa">
                                    <option selected disabled>Pilih Kecamatan Dahulu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="detail_alamat">Detail Alamat</label>
                                <textarea class="form-control" name="detail_alamat" id="form_detail_alamat"
                                    rows="2"></textarea>
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
<script>
    const daerah = JSON.parse('@json($kecamatan)');

    $('#form_kecamatan').on('change', function (e) {
        const selectedValue = $(this).find(":selected").val();
        const desaInput = $('#form_desa');
        desaInput.empty();

        daerah.forEach(function (d) {
            if (d.id == selectedValue) {
                desaInput.append(`<option selected disabled>Pilih Desa</option>`)
                d.desa.forEach(desa => {
                    desaInput.append(`<option value="${desa.id}">${desa.nama}</option>`);
                })
            }
        });
    });
</script>
@endsection