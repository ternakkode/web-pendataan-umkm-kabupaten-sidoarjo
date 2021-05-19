<?php

Route::get('/', 'BrandingController@index');
Route::get('produk', 'BrandingController@produk');
Route::get('produk/{id}', 'BrandingController@detailProduk');
Route::get('umkm', 'BrandingController@umkm');
Route::get('statistik', 'BrandingController@statistik');
Route::get('umkm/{id}', 'BrandingController@detailUmkm');
Route::get('informasi', 'BrandingController@informasi');
Route::get('informasi/{id}', 'BrandingController@detailInformasi');
Route::get('tentang-kami', 'BrandingController@tentangKami');

Route::get('/app/login', 'AuthenticationController@appLogin');
Route::get('/app/register', 'AuthenticationController@appRegister');
Route::post('/app/register', 'AuthenticationController@processRegister');
Route::get('/app/verification', 'AuthenticationController@reminderVerificationEmail');
Route::get('/app/verification/process', 'AuthenticationController@processVerification');
Route::get('/backoffice/login', 'AuthenticationController@backofficeLogin');
Route::post('/login', 'AuthenticationController@processLogin');
Route::post('/logout', 'AuthenticationController@logout');

Route::group(['prefix' => 'app', 'middleware' => ['is.authenticated', 'is.user', 'validate.back'], 'namespace' => 'App', 'name' => 'app.'], function () {
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
            Route::get('/cetak', 'DashboardController@cetak');
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
    Route::get('/export/umkm', 'UmkmController@exportAll');
    
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
    Route::resource('user', 'UserController');
    Route::get('/umkm/{id}/approval', 'UmkmController@approval');
    Route::get('/umkm/{id}/cetak', 'UmkmController@cetak');
    Route::resource('umkm.produk', 'ProdukController')->except('show');
});
