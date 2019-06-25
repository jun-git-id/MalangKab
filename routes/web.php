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
Auth::routes();
Route::get('/masuk', function () {
    return view('login');
});

Route::get('/profile', function () {
    return view('editprofile');
});
Route::get('/home', 'HomeController@index')->name('beranda');

Route::get('/home', 'ProfileController@index');

Route::get('/beranda', 'HomeController@index')->name('home');
