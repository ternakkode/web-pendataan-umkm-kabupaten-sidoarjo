@extends('layout.user')
@section('title', 'Data Profil Anda')
@section('content')
<form method="POST" enctype="multipart/form-data">
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Profil Anda</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nama">Username</label>
                                <input type="text" class="form-control" name="username" id="form_username"
                                    value="{{ $user->username }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nama">Password Baru</label>
                                <input type="password" class="form-control" name="password" id="form_password">
                                <small id="passwordHelp" class="form-text text-muted">Silahkan dikosongi jika anda tidak ingin merubah password anda.</small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="form_nama"
                                    value="{{ $user->nama }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" class="form-control" name="nik" id="form_nik"
                                    value="{{ $user->nik }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="number" class="form-control" name="no_hp" id="form_no_hp"
                                    value="{{ $user->no_hp }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                <select class="form-control" name="pendidikan_terakhir" id="form_pendidikan_terakhir">
                                    <option selected disabled>Pilih Pendidikan Terakhir</option>
                                    <option value="sd" @if($user->pendidikan_terakhir == 'sd') selected @endif>SD
                                    </option>
                                    <option value="smp" @if($user->pendidikan_terakhir == 'smp') selected @endif>SMP
                                    </option>
                                    <option value="sma" @if($user->pendidikan_terakhir == 'sma') selected @endif>SMA
                                    </option>
                                    <option value="diploma" @if($user->pendidikan_terakhir == 'diploma') selected
                                        @endif>DIPLOMA</option>
                                    <option value="s1" @if($user->pendidikan_terakhir == 's1') selected @endif>S1
                                    </option>
                                    <option value="s2" @if($user->pendidikan_terakhir == 's2') selected @endif>S2
                                    </option>
                                    <option value="s3" @if($user->pendidikan_terakhir == 's3') selected @endif>S3
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="foto_profil">Foto Profil</label>
                                <div class="image-wrapper row">
                                    <div class="col-md-2">
                                        <img src="{{ url(profile_image_link($user->foto_profil)) }}"
                                            class="img-thumbnail" width="70%">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="foto_profil"
                                                id="form_foto_profil">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control" name="kecamatan" id="form_kecamatan">
                                    <option selected disabled>Pilih Kecamatan</option>
                                    @foreach($kecamatan as $kec)
                                    <option value="{{ $kec->id }}" @if($user->alamat->id_kecamatan == $kec->id) selected @endif>{{ $kec->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="desa">Desa</label>
                                <select class="form-control" name="desa" id="form_desa">
                                    <option selected disabled>Pilih Desa</option>
                                    @foreach($desa as $des)
                                    <option value="{{ $des->id }}" @if($user->alamat->id_desa == $des->id) selected
                                        @endif>{{ $des->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="detail_alamat">Detail Alamat</label>
                                <textarea class="form-control" name="detail_alamat" id="form_detail_alamat"
                                    rows="2">{{ $user->alamat->detail }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navigation text-center">
                <button type="submit" class="btn btn-success w-100">SIMPAN PERUBAHAN</button>
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