@extends('layout.admin')
@section('title', 'Data UMKM')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Data UMKM</h6>
        <div class="cta-wrapper float-right mt-1">
            <a href="{{ url('backoffice/export/umkm') }}" type="button" class="btn btn-primary btn-sm mb-1">Export Data UMKM</a>
            <a href="{{ url('backoffice/umkm/create') }}" type="button" class="btn btn-success btn-sm mb-1">Tambah Data UMKM</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Usaha</th>
                    <th scope="col">Nama Pemilik</th>
                    <th scope="col">Jenis Usaha</th>
                    <th scope="col">Status Approval</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($umkm as $key => $u)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $u->nama_usaha }}</td>
                    <td>{{ $u->user->nama }}</td>
                    <td>{{ $u->jenisUsaha->nama }}</td>
                    <td>
                    @if ($u->telah_diterima == 1)
                        Telah Diterima
                    @elseif ($u->telah_diterima == 0 && $u->diterima_pada)
                        Telah Ditolak
                    @else
                        Menunggu Persetujuan
                    @endif
                    </td>
                    <td>
                        <a target="_blank" href="{{ url('backoffice/umkm/'.$u->id.'/cetak')}}" class="btn btn-secondary btn-sm d-inline">CETAK</a>
                        <a href="{{ url('backoffice/umkm/'.$u->id)}}" class="btn btn-secondary btn-sm d-inline">DETAIL</a>
                        <a href="{{ url('backoffice/umkm/'.$u->id.'/produk')}}" class="btn btn-warning btn-sm d-inline">PRODUK</a>
                        @if($status == 'all')
                        <a href="{{ url('backoffice/umkm/'.$u->id.'/edit')}}" class="btn btn-primary btn-sm d-inline">UBAH</a>
                        <form method="POST" action="{{ url('backoffice/umkm/'.$u->id)}}" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm mt-2">HAPUS</button>
                        </form>
                        @elseif($status == 'pending' && empty($diterima_pada))
                        <a href="{{ url('backoffice/umkm/'.$u->id.'/approval?status=approve')}}" class="btn btn-success btn-sm d-inline">TERIMA</a>
                        <button class="btn btn-danger btn-sm d-inline" data-toggle="modal" data-target="#denyUmkmModal" onclick="triggerDenyUmkm({{ $u->id }})">TOLAK</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('modal')
<div class="modal fade" id="denyUmkmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form method="GET" action="{{ url('backoffice/umkm/')}}" id="formDenyUmkm">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tolak UMKM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="status" value="deny">
                    <div class="form-group">
                        <label for="alasan">Alasan Penolakan</label>
                        <textarea class="form-control" name="alasan_penolakan" rows="3" style="min-height:300px"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-danger">Tolak UMKM</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('.table').DataTable();
    });

    function triggerDenyUmkm(id) {
        let oldSubmitUrl = $('#formDenyUmkm').attr('action');
        $('#formDenyUmkm').attr('action', `${oldSubmitUrl}/${id}/approval`);
    }
</script>
@if (session('success_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{session('success_message') }}'
    })
</script>
@elseif (session('failed_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{session('failed_message') }}'
    })
</script>
@endif
@endsection