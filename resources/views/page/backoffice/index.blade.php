@extends('layout.admin')
@section('title', 'Halaman Awal')
@section('content')
@endsection
@section('js')
@if (session('success_message'))
<script type="text/javascript">
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success_message') }}'
    })
</script>
@endif
@endsection