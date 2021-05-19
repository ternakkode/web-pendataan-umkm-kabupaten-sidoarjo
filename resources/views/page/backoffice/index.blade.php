@extends('layout.admin')
@section('title', 'Halaman Awal')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary float-left">Halaman Awal</h6>
                <div class="btn-group float-right">
                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Statistik Berdasarkan
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item @if($group_by == 'jenis_usaha') active @endif" href="?chart=jenis_usaha">Jenis Usaha</a>
                        <a class="dropdown-item @if($group_by == 'lama_usaha') active @endif" href="?chart=lama_usaha">Lama Usaha</a>
                        <a class="dropdown-item @if($group_by == 'legalitas') active @endif" href="?chart=legalitas">Legalitas</a>
                        <a class="dropdown-item @if($group_by == 'modal') active @endif" href="?chart=modal">Modal</a>
                        <a class="dropdown-item @if($group_by == 'kecamatan_pemilik') active @endif" href="?chart=kecamatan_pemilik">Kecamatan Pemilik</a>
                        <a class="dropdown-item @if($group_by == 'kecamatan_umkm') active @endif" href="?chart=kecamatan_umkm">Kecamatan UMKM</a>
                        <a class="dropdown-item @if($group_by == 'kelurahan_pemilik') active @endif" href="?chart=kelurahan_pemilik">Kelurahan Pemilik</a>
                        <a class="dropdown-item @if($group_by == 'kelurahan_umkm') active @endif" href="?chart=kelurahan_umkm">Kelurahan Pemilik</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <canvas id="statisticChart" style="max-height:70vh"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function getColors(length) {
        let pallet = ["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC",
            "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"
        ];
        let colors = [];

        for (let i = 0; i < length; i++) {
            colors.push(pallet[i % pallet.length]);
        }

        return colors;
    }

    let data = {
        labels: @json($label),
        datasets: [{
            data: @json($data),
            backgroundColor: getColors(@json($total)),
            hoverOffset: 4
        }]
    };


    let statisticChart = new Chart(
        document.getElementById('statisticChart'), {
            type: 'pie',
            data,
        }
    );
</script>

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