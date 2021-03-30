<?php
Route::get('/app/login', 'AuthenticationController@appLogin');
Route::get('/backoffice/login', 'AuthenticationController@backofficeLogin');
Route::post('/login', 'AuthenticationController@processLogin');
Route::post('/logout', 'AuthenticationController@logout');

Route::group(['prefix' => 'app', 'middleware' => ['is.authenticated', 'is.user'], 'namespace' => 'App', 'name' => 'app.'], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/complete', 'ProfileController@complete');
        Route::get('/edit', 'ProfileController@edit');
        Route::post('/', 'ProfileController@process');
    });
    Route::get('/', 'DashboardController@index');

    Route::group(['prefix' => 'umkm', 'namespace' => 'Umkm', 'name' => 'umkm.'], function () {
        Route::post('/authorize', 'AuthorizationController@authorize');
        Route::get('/new', 'AuthorizationController@registration');
        Route::post('/new', 'AuthorizationController@registration');
    });
});

Route::group(['prefix' => 'backoffice', 'middleware' => ['is.authenticated', 'is.admin'], 'namespace' => 'admin', 'name' => 'admin.'], function () {
    Route::get('/', function () {
        return view('page/backoffice/index');
    });
});
