@extends('layout.user')
@section('title', 'Form Pengajuan Ulang UMKM')
@section('content')
<form method="POST">
<input type="hidden" name="id_umkm" value="{{ $umkm->id }}">
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
                    <h6 class="m-0 font-weight-bold text-primary">Form Pengajuan Ulang UMKM</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nib">Nomor Badan Usaha</label>
                                <input type="number" class="form-control" name="nib" id="form_nib" value="{{ $umkm->nib }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="npwp">NPWP</label>
                                <input type="text" class="form-control" name="npwp" id="form_npwp" value="{{ $umkm->npwp }}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="nama_usaha">Nama Usaha</label>
                                <input type="text" class="form-control" name="nama_usaha" id="form_nama_usaha" value="{{ $umkm->nama_usaha }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control" name="kecamatan" id="form_kecamatan">
                                    <option selected disabled>Pilih Kecamatan</option>
                                    @foreach($kecamatan as $kec)
                                    <option value="{{ $kec->id }}" @if($umkm->alamat->id_kecamatan == $kec->id) selected @endif>{{ $kec->nama }}</option>
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
                                    <option value="{{ $des->id }}" @if($umkm->alamat->id_desa == $des->id) selected
                                        @endif>{{ $des->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="detail_alamat">Detail Alamat</label>
                                <textarea class="form-control" name="detail_alamat" id="form_detail_alamat"
                                    rows="2">{{ $umkm->alamat->detail }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jenis_usaha">Jenis Usaha</label>
                                <select class="form-control" name="jenis_usaha" id="form_jenis_usaha">
                                    <option selected disabled>Pilih Jenis Usaha</option>
                                    @foreach($jenis_usaha as $j_u)
                                    <option value="{{ $j_u->id }}" @if($umkm->id_jenis_usaha == $j_u->id) selected @endif>{{ $j_u->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lama_usaha">Lama Usaha</label>
                                <select class="form-control" name="lama_usaha" id="form_lama_usaha">
                                    <option selected disabled>Pilih Lama Usaha</option>
                                    @foreach($lama_usaha as $l_u)
                                    <option value="{{ $l_u->id }}" @if($umkm->id_lama_usaha == $l_u->id) selected @endif>{{ $l_u->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="legalitas">Legalitas</label>
                                <div class="form-group">
                                    @foreach($legalitas as $l)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="legalitas[]"
                                            id="legalitas_{{ $l->id }}" value="{{ $l->id }}"
                                            @foreach ($umkm->legalitas as $legalitas)
                                                @if ($legalitas->id == $l->id) checked @endif
                                            @endforeach
                                            >
                                        <label class="form-check-label"
                                            for="legalitas_{{ $l->id }}">{{ $l->nama }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="modal">Modal</label>
                                <select class="form-control" name="modal" id="form_modal">
                                    <option selected disabled>Pilih Modal</option>
                                    @foreach($modal as $m)
                                    <option value="{{ $m->id }}" @if($umkm->id_modal == $m->id) selected @endif>{{ $m->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navigation text-center">
                <button type="submit" class="btn btn-success w-100 font-weight-bold">AJUKAN ULANG</button>
            </div>
        </div>
    </div>
</form>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $("#form_npwp").mask("00.000.000.0-000.000", {
        placeholder: "__.___.___._-___.___"
    });


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