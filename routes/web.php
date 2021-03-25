<?php

Route::get('/', function () {
    return view('page/front/index');
});

Route::group(['prefix' => 'backoffice', 'namespace' => 'admin', 'name' => 'admin.'], function () {
    Route::get('/', function () {
        return view('page/backoffice/index');
    });
});
