@extends('layout.admin')
@section('title', 'Data Pengurus')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Data Pengurus</h6>
        <a href="{{ url('backoffice/admin/create') }}" type="button" class="btn btn-success float-right btn-sm">Tambah Data Pengurus</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Dibuat Pada</th>
                    <th scope="col">Terakhir Diubah Pada</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $key => $admin)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $admin->nama }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->created_at }}</td>
                    <td>{{ $admin->updated_at }}</td>
                    <td>
                        <a href="{{ url('backoffice/admin/'.$admin->id.'/edit')}}" class="btn btn-primary btn-sm d-inline">UBAH</a>
                        <form method="POST" action="{{ url('backoffice/admin/'.$admin->id)}}" class="d-inline">
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