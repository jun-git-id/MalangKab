<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('beranda');
});

Route::get('/daftar', function () {
    return view('daftar');
});
//<<<<<<< HEAD
//Route::get('/login', function () {
//    return view('login');
//});
//=======

Auth::routes();
Route::get('/masuk', function () {
    return view('login');
});

Route::get('/profile', function () {
    return view('editprofile');
});

//Route::get('/input', function () {
//    return view('input');
//});
//Route::get('/', 'HomeController@index')->name('beranda');
Route::get('/Tempat', function () {
    return view('TempatUsaha');
});

Route::get('/editProfile/{id}', 'ProfileController@edit');
Route::put('/editProfile/{id}', 'ProfileController@update');

Route::get('/', 'HomeController@index');

Route::resource('tempatusaha','TempatUsahaController');
Route::get('/inputUsaha', 'TempatUsahaController@create');
Route::get('/detailusaha/{id}', 'TempatUsahaController@show');
Route::resource('kecamatan','KecamatanController');
Route::get('/detailusaha', function () {
    return view('detailusaha');
});
Route::get('/detailproduk', function () {
    return view('detailproduk');
});
Route::get('/maps', function () {
    return view('maps');
});

Route::get('/inputProduk', function () {
    return view('inputProduk');
});