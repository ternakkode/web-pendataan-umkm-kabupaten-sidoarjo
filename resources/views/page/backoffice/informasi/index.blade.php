@extends('layout.admin')
@section('title', 'Data Informasi')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Data Informasi</h6>
        <a href="{{ url('backoffice/informasi/create') }}" type="button" class="btn btn-success float-right btn-sm">Tambah Data Informasi</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Status</th>
                    <th scope="col">Waktu Terbit</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informasi as $key => $i)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $i->judul }}</td>
                    <td>{{ $i->telah_terbit ? 'Telah Terbit' : 'Draft' }}</td>
                    <td>{{ $i->terbit_pada ?? 'Belum Terbit' }}</td>
                    <td>
                        <a href="{{ url('backoffice/informasi/'.$i->id)}}" class="btn btn-success btn-sm d-inline">DETAIL</a>
                        <a href="{{ url('backoffice/informasi/'.$i->id.'/edit')}}" class="btn btn-primary btn-sm d-inline">UBAH</a>
                        <form method="POST" action="{{ url('backoffice/informasi/'.$i->id)}}" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">HAPUS</button>
                        </form>
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