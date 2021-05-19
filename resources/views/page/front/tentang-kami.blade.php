@extends('layout.front', ['page' => 'tentang-kami'])
@section('title', 'Daftar Produk')
@section('content')
<div class="tentang-kami">
    <div class="secondary-hero">
        <div class="title-wrapper text-center">
            <h1 class="font-weight-bold secondary-hero-main-title">Tentang Kami</h1>
            <p>Halaman Awal / Tentang Kami</p>
        </div>
    </div>

    <div class="container mt-5">
        <div class="title-image-wrapper text-center">
            <h1 class="font-weight-bold">KLINIK USAHA MIKRO KABUPATEN SIDOARJO</h1>
            <img src="{{ url('img/sidoarjo-logo.svg') }}" class="text-center img-fluid">
        </div>
        <div class="about-detail">
            <p>
                Layanan Konsultasi bagi KUMKM ini merupakan salah satu layanan Klinik Koperasi dan Usaha Mikro yang
                diselenggarakan di Kantor Dinas Koperasi dan UMKM Kab. Sidoarjo Jl jaksa Agung Suprapto No 20 Sidoarjo
                sejak
                April 2017 yang diampu oleh konsultan profesional.<br>
                Layanan Konsultasi UMKM ini dilayani oleh 2 orang tenaga ahli dan konsultan KUMKM dan 2 tenaga
                administrasi
                yang bertanggung jawab secara langsung ke Kepala Dinas Koperasi dan UMKM Kab. Sidoarjo.<br>
                Klinik Konsultasi KUM pada Klinik Koperasi dan Usaha Mikro Kab. Sidoarjo memadukan Konsep 5 C dalam visi
                dan
                misinya yaitu :
            </p>
            <p>
                Visi 1C : <br>
                Mewujudkan Klinik KUM sebagai Pusat Unggulan bagi Pembelajaran dan Layanan Pengembangan Bisnis Terpadu
                bagi
                Koperasi dan Usaha Mikro (KUM) di Kab. Sidoarjo serta Menjadi Acuan Tingkat Nasional Pada Tahun 2022
                (Center
                of Exellence)
            </p>
            <p>
                Misi 4C : <br>
                1. Mewujudkan layanan terintegrasi dalam bidang pendampingan, pembinaan dan pengembangan KUMKM dalam
                memberikan solusi dan menyelesaikan permasalahan (Center of Problem Solution) <br>
                2. Menjadikan Klinik Konsultasi KUMKM sebagai tempat terbaik yang dapat memberikan acuan dan refensi
                yang tepat untuk mendapatkan solusi terbaik dari berbagai permasalahan yang dihadapi KUMKM (Center of
                Reference) <br>
                3. Menjadikan Klinik Konsultasi KUMKM sebagai pusat penelitian dan pengembangan mengenai KUMKM dimana
                hasilnya dapat dimanfaatkan oleh pelaku KUMKM (Center of Research)<br>
                4. Menjadikan Klinik Konsultasi KUMKM sebagai pusat ilmu , sumber pengetahuan dan tempat praktik terbaik
                bagi KUMKM (Center of Best Practice) <br>
            </p>
            <p>
                Melalui SK Kadinas Koperasi dan UMKM Kab. Sidoarjo No ...................... para professional tersebut
                siap
                melakukan pendampingan dan bimbingan kepada KUM di Kab. Sidoarjo dengan Layanan Prima :
            </p>
        </div>
        <div class="program-kami">
            <h1 class="program-kami-title font-weight-bold text-center pt-5">Program Kami</h1>
            <div class="row pt-4 pb-5">
                <div class="col-md-3 mb-1">
                    <div class="card card-program-kami card-type-one">
                        <div class="card-body text-center">
                            <h5 class="card-title">KONSULTASI</h5>
                            <p class="card-text">Layanan konsultasi untuk meningkatkan pemasaran produk UMKM di
                                Sidoarjo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-1">
                    <div class="card card-program-kami card-type-two">
                        <div class="card-body text-center">
                            <h5 class="card-title">PELATIHAN</h5>
                            <p class="card-text">Layanan pelatihan untuk meningkatkan pemasaran produk UMKM di Sidoarjo.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-1">
                    <div class="card card-program-kami card-type-one">
                        <div class="card-body text-center">
                            <h5 class="card-title">PENDAMPINGAN</h5>
                            <p class="card-text">Layanan Informasi Bisnis bagi usaha mikro serta peningkatan kapasitas
                                pengusaha mikro di sidoarjo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-1">
                    <div class="card card-program-kami card-type-two">
                        <div class="card-body text-center">
                            <h5 class="card-title">PEMBIAYAAN</h5>
                            <p class="card-text">Bantuan akses pembiayaan serta layanan konsultasi terkait pembiayaan
                                bagi
                                pengusaha mikro di Sidoarjo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection