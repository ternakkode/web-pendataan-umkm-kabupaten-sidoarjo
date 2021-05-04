<?php

Route::get('/', 'BrandingController@index');

Route::get('/app/login', 'AuthenticationController@appLogin');
Route::get('/backoffice/login', 'AuthenticationController@backofficeLogin');
Route::post('/login', 'AuthenticationController@processLogin');
Route::post('/logout', 'AuthenticationController@logout');

Route::group(['prefix' => 'app', 'middleware' => ['is.authenticated', 'is.user'], 'namespace' => 'App', 'name' => 'app.'], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/complete', 'ProfileController@complete');
        Route::post('/complete', 'ProfileController@processComplete');
    });

    Route::middleware('is.profile.completed')->group(function () {
        Route::get('/', 'DashboardController@index');

        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'ProfileController@edit');
            Route::put('/', 'ProfileController@processEdit');
        });
        
        Route::group(['prefix' => 'umkm', 'namespace' => 'Umkm', 'name' => 'umkm.'], function () {
            Route::get('/', 'DashboardController@index');
            Route::get('/edit', 'DashboardController@editInformation');
            Route::post('/edit', 'DashboardController@processEditInformation');
            Route::post('/authorize', 'AuthorizationController@authorizeUmkm');
            Route::get('/new', 'AuthorizationController@registration');
            Route::post('/new', 'AuthorizationController@registrationProcess');
            Route::get('/pengajuan-ulang', 'DashboardController@pengajuanUlang');
            Route::post('/pengajuan-ulang', 'DashboardController@processPengajuanUlang');
            
            Route::resource('produk', 'ProdukController')->except('show');
        });
    });
});

Route::group(['prefix' => 'backoffice', 'middleware' => ['is.authenticated', 'is.admin'], 'namespace' => 'Backoffice', 'name' => 'backoffice.'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('admin', 'AdminController')->except('show');
    Route::resource('desa', 'DesaController')->except('show');
    Route::resource('informasi', 'InformasiController');
    Route::resource('jenis-usaha', 'JenisUsahaController')->except('show');
    Route::resource('kecamatan', 'KecamatanController')->except('show');
    Route::resource('lama-usaha', 'LamaUsahaController')->except('show');
    Route::resource('legalitas', 'LegalitasController')->except('show');
    Route::resource('modal', 'ModalController')->except('show');
    Route::resource('umkm', 'UmkmController');
    Route::get('/umkm/{id}/approval', 'UmkmController@approval');
    Route::resource('umkm.produk', 'ProdukController')->except('show');
});
