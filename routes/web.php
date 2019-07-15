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
Route::get('/tempat-usaha-saya','TempatUsahaController@tempatUsahaSaya');
Route::post('tempatusaha/create/fetch', 'TempatUsahaController@subKategori')->name('dynamicdependent.fetch');
Route::get('/detailusaha/{id}', 'TempatUsahaController@show');
Route::resource('kecamatan','KecamatanController');

Route::resource('products','ProductController');
Route::get('/produk-saya','ProductController@produkSaya');
Route::post('upload-image', 'ProductController@uploadImage')->name('upload.image');
Route::delete('delete-image/{id}', 'ProductController@deleteImage')->name('delete.image');


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

//Route::get('/usahaSaya', function () {
//    return view('usahaSaya');
//});
Route::get('/usahaFavorit', function () {
    return view('usahaFavorit');
});
Route::get('/produk', function () {
    return view('produk');
});
//Route::get('/produkSaya', function () {
//    return view('produkSaya');
//});
Route::get('/produkFavorit', function () {
    return view('produkFavorit');
});