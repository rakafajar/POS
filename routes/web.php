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
Route::group(['middleware'=> ['web','cekuser:1']],
function(){
    // Untuk Controller Kategori
    Route::resource('kategori', 'KategoriController');

    // Untuk Controller Produk
    Route::resource('produk', 'ProdukController');
    // Print Barcode
    Route::post('barcode', 'ProdukController@printBarcode');
    // Membuat Delete all Dengan Checkbox Belum Bisa
    Route::post('produk/deletesemua', 'ProdukController@deletesemua');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
