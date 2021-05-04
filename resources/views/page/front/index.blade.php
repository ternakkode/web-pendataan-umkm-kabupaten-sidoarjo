@extends('layout.front')
@section('title', 'Halaman Awal')
@section('content')
<h1 class="text-center mt-5 pt-5 mb-5 pb-5">
    INI ADALAH LANDING PAGE
</h1>
@endsection
@section('js')
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