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