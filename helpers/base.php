<?php

function information_image_link($fileName) {
    return asset('storage/'.config('url.information').$fileName);
}

function temporary_product_image_link($fileName) {
    return asset('storage/'.config('url.tmp_product').$fileName);
}

function product_image_link($fileName) {
    return asset('storage/'.config('url.product').$fileName);
}

function profile_image_link($fileName) {
    return asset('storage/'.config('url.profile').$fileName);
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);
    
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}