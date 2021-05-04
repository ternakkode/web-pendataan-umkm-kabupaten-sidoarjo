@extends('layout.admin')
@section('title', 'Data UMKM')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Data UMKM</h6>
        <a href="{{ url('backoffice/umkm/create') }}" type="button" class="btn btn-success float-right btn-sm">Tambah Data UMKM</a>
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
                        <a href="{{ url('backoffice/umkm/'.$u->id)}}" class="btn btn-secondary btn-sm d-inline">DETAIL</a>
                        <a href="{{ url('backoffice/umkm/'.$u->id.'/produk')}}" class="btn btn-warning btn-sm d-inline">PRODUK</a>
                        @if($status == 'all')
                        <a href="{{ url('backoffice/umkm/'.$u->id.'/edit')}}" class="btn btn-primary btn-sm d-inline">UBAH</a>
                        <form method="POST" action="{{ url('backoffice/umkm/'.$u->id)}}" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">HAPUS</button>
                        </form>
                        @elseif($status == 'pending' && empty($diterima_pada))
                        <a href="{{ url('backoffice/umkm/'.$u->id.'/approval?status=approve')}}" class="btn btn-success btn-sm d-inline">TERIMA</a>
                        <a href="{{ url('backoffice/umkm/'.$u->id.'/approval?status=deny')}}" class="btn btn-danger btn-sm d-inline">TOLAK</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('.table').DataTable();
    });
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