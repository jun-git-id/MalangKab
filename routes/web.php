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
Route::get('/','HomeController@kategori');

Route::get('/editProfile/{id}', 'ProfileController@edit');
Route::put('/editProfile/{id}', 'ProfileController@update');

Route::get('/', 'HomeController@index');
Route::put('/beranda/{id}', 'ProductController@like')->name('like.product');
Route::put('/{id}', 'TempatUsahaController@like')->name('like.usaha');


Route::resource('tempatusaha','TempatUsahaController');
Route::get('/tempat-usaha-saya','TempatUsahaController@tempatUsahaSaya');
Route::get('/json-subSektor','TempatUsahaController@subSektor');
Route::get('/json-desa','TempatUsahaController@desa');
Route::get('/json-filterKecamatan','TempatUsahaController@filterKecamatan');

Route::get('/ajax-adminTempatUsaha','TempatUsahaController@adminIndex')->name('usaha.adminIndex');
Route::get('/ajax-adminTempatUsaha/{id}','TempatUsahaController@adminEdit');
Route::post('/ajax-adminTempatUsaha/update','TempatUsahaController@adminUpdate')->name('usaha.adminUpdate');
Route::delete('/ajax-adminTempatUsaha/delete/{id}','TempatUsahaController@adminDestroy')->name('usaha.adminDestroy');
Route::get('/adminTempatUsaha','TempatUsahaController@admin');

Route::resource('adminDesa','DesaController');
Route::get('/adminDesa/json','DesaController@dataIndex')->name('desa.dataIndex');
Route::get('adminDesa/{id}','DesaController@edit');
Route::get('adminDesa/delete/{id}','DesaController@destroy');

Route::resource('dashboard', 'DashboardController');

Route::get('/detailusaha/{id}', 'TempatUsahaController@show');
Route::resource('adminKecamatan','KecamatanController');
Route::post('adminKecamatan/store', 'KecamatanController@store');
Route::get('adminKecamatan/delete/{id}', 'KecamatanController@destroy');
Route::get('/usahaFavorit', 'TempatUsahaController@usaha_favorit')->name('tempatUsaha.favorit');
Route::delete('/usahaFavorit/{id}','TempatUsahaController@deleteFavorit')->name('tempatUsaha.deleteFavorit');
Route::post('/usahaFavorit/{usaha}','TempatUsahaController@dislike')->name('tempatUsaha.dislike');

Route::resource('adminKategoriUsaha','KategoriUsahaController');
Route::post('adminKategoriUsaha/store', 'KategoriUsahaController@store');
Route::get('adminKategoriUsaha/delete/{id}', 'KategoriUsahaController@destroy');

Route::resource('adminSektorUsaha','SektorController');
Route::post('adminSektorUsaha/store', 'SektorController@store');
Route::get('adminSektorUsaha/delete/{id}', 'SektorController@destroy');

Route::resource('adminSubSektorUsaha','SubSektorController');
Route::get('/adminSubSektorUsaha/json','SubSektorController@dataIndex')->name('subsektor.dataIndex');
Route::get('adminSubSektorUsaha/{id}','SubSektorController@edit');
Route::get('adminSubSektorUsaha/delete/{id}','SubSektorController@destroy');

Route::resource('adminKegiatanUsaha','KegiatanUsahaController');
Route::post('adminKegiatanUsaha/store', 'KegiatanUsahaController@store');
Route::get('adminKegiatanUsaha/delete/{id}', 'KegiatanUsahaController@destroy');

Route::resource('adminStatusKepemilikan','StatusKepemilikanController');
Route::post('adminStatusKepemilikan/store', 'StatusKepemilikanController@store');
Route::get('adminStatusKepemilikan/delete/{id}', 'StatusKepemilikanController@destroy');

Route::resource('adminJenisInvestasi','JenisInvestasiController');
Route::post('adminJenisInvestasi/store', 'JenisInvestasiController@store');
Route::get('adminJenisInvestasi/delete/{id}', 'JenisInvestasiController@destroy');

Route::resource('adminJenisProduk','JenisProductController');
Route::post('adminJenisProduk/store', 'JenisProductController@store');
Route::get('adminJenisProduk/delete/{id}', 'JenisProductController@destroy');

Route::resource('adminUnitProduct','UnitProductController');
Route::post('adminUnitProduct/store', 'UnitProductController@store');
Route::get('adminUnitProduct/delete/{id}', 'UnitProductController@destroy');

Route::resource('products','ProductController');
Route::get('/detailproduk/{id}','ProductController@show');

Route::get('/json-desa','ProductController@desa');
Route::get('/produk-saya','ProductController@produkSaya');
Route::post('upload-image', 'ProductController@uploadImage')->name('upload.image');
Route::delete('delete-image/{id}', 'ProductController@deleteImage')->name('delete.image');
Route::get('/produkFavorit', 'ProductController@product_favorit')->name('products.favorit');
Route::delete('/produkFavorit/{id}','ProductController@deleteFavorit')->name('product.deleteFavorit');
Route::post('/produkFavorit/{products}','ProductController@dislike')->name('product.dislike');

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

Route::get('/produk', function () {
    return view('produk');
});
//Route::get('/produkSaya', function () {
//    return view('produkSaya');
//});

Route::get('/admin', function () {
    return view('admin.dasboard');
});

//Route::get('/adminSubKategoriUsaha', function () {
//    return view('admin.adminSubKategoriUsaha');
//});
//Route::get('/adminKegiatanUsaha', function () {
//    return view('admin.adminKegiatanUsaha');
//});
//Route::get('/adminStatusKepemilikan', function () {
//    return view('admin.adminStatusKepemilikan');
//});
//Route::get('/adminJenisInvestasi', function () {
//    return view('admin.adminJenisInvestasi');
//});
//Route::get('/adminJenisProduk', function () {
//    return view('admin.adminJenisProduk');
//});
//Route::get('/adminKecamatan', function () {
////    return view('admin.adminKecamatan');
////});
//Route::get('/adminDesa', function () {
//    return view('admin.adminDesa');
//});
//Route::get('/adminKategoriUsaha', function () {
//    return view('admin.adminKategoriUsaha');
//});

