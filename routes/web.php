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

Route::get('/detailp', function () {
    return view('Detailproduk');
});

Route::get('/detail2', function () {
    return view('products.detailProduk');
});

Route::get('/home', 'HomeController@index')->name('beranda');

Route::get('/editProfile/{id}', 'ProfileController@edit');
Route::put('/editProfile/{id}', 'ProfileController@update');

Route::get('/', 'HomeController@index');

Route::resource('tempatusaha','TempatUsahaController');
Route::get('/tempat-usaha-saya','TempatUsahaController@tempatUsahaSaya');
Route::get('/json-subSektor','TempatUsahaController@subSektor');
Route::get('/json-desa','TempatUsahaController@desa');
Route::get('/json-filterKecamatan','TempatUsahaController@filterKecamatan');

Route::get('/detailusaha/{id}', 'TempatUsahaController@show');
Route::resource('kecamatan','KecamatanController');

Route::resource('products','ProductController');
Route::get('/detailproduk/{id}','ProductController@show');

Route::get('/json-desa','ProductController@desa');
Route::get('/produk-saya','ProductController@produkSaya');
Route::post('upload-image', 'ProductController@uploadImage')->name('upload.image');
Route::delete('delete-image/{id}', 'ProductController@deleteImage')->name('delete.image');

Route::resource('maps','MapController');
Route::get('/json-maps','MapController@maps');
Route::get('/json-subSektor','MapController@subSektor');
Route::get('/json-desa','MapController@desa');

Route::get('/detailusaha', function () {
    return view('detailusaha');
});

Route::get('/detailproduk1', function () {
    return view('cobaindetail_bckp');
});
//Route::get('/maps', function () {
//    return view('maps');
//});

Route::get('/inputProduk', function () {
    return view('inputProduk');
});

//Route::get('/usahaSaya', function () {
//    return view('usahaSaya');
//});
Route::get('/usahaFavorit', function () {
    return view('tempatUsaha.usahaFavorit');
});
Route::get('/produk', function () {
    return view('produk');
});
//Route::get('/produkSaya', function () {
//    return view('produkSaya');
//});
Route::get('/produkFavorit', function () {
    return view('products.produkFavorit');
});
Route::get('/admin', function () {
    return view('admin.dasboard');
});
Route::get('/adminTempatUsaha', function () {
    return view('admin.adminTempatUsaha');
});
Route::get('/adminSubKategoriUsaha', function () {
    return view('admin.adminSubKategoriUsaha');
});
Route::get('/adminKegiatanUsaha', function () {
    return view('admin.adminKegiatanUsaha');
});
Route::get('/adminStatusKepemilikan', function () {
    return view('admin.adminStatusKepemilikan');
});
Route::get('/adminJenisInvestasi', function () {
    return view('admin.adminJenisInvestasi');
});
Route::get('/adminJenisProduk', function () {
    return view('admin.adminJenisProduk');
});
Route::get('/adminKecamatan', function () {
    return view('admin.adminKecamatan');
});
Route::get('/adminDesa', function () {
    return view('admin.adminDesa');
});
Route::get('/adminKategoriUsaha', function () {
    return view('admin.adminKategoriUsaha');
});