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
Route::group(
    ['middleware' => ['web', 'cekuser:1']],
    function () {
        // Untuk Controller dan View Kategori
        Route::resource('kategori', 'KategoriController');
        /*  Controller Produk dan View Produk 
            Print Cetak Barcode Produk
            Hapus Select Produk
        */
        Route::resource('produk', 'ProdukController');
        Route::post('produk/cetak', 'ProdukController@printBarcode');
        Route::post('produk/hapus', 'ProdukController@deleteSelected');
        // Untuk Controller dan View Supplier
        Route::resource('supplier', 'SupplierController');
        // Untuk Controller dan View Member
        Route::resource('member', 'MemberController');
        Route::post('member/cetak', 'MemberController@printBarcode');
        Route::get('member/destroy/{id}', 'MemberController@destroy');
        // Untuk Controller dan View Pengeluaran
        Route::resource('pengeluaran', 'PengeluaranController');
        // Untuk Controller dan View User
        Route::resource('user', 'UserController');
        // Untuk Controller dan View Pembelian
        Route::get('pembelian/{id}/tambah', 'PembelianController@create');
        Route::get('pembelian/{id}/lihat', 'PembelianController@show');
        Route::resource('pembelian', 'PembelianController');
    }
);

Route::group(['middleware' => 'web'], function () {
    Route::get('user/profil', 'UserController@profil')->name('user.profil');
    Route::patch('user/{id}/change', 'UserController@changeProfil');
});

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
