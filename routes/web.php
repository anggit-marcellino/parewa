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
    return view('auth.login');
});

Auth::routes();
Route::get('logout', function(){
    Auth::logout();
    return redirect('login');
});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['manager','head barista','barista']], function () {

    Route::group(['prefix' => 'home'], function () {
        Route::get('/', 'HomeController@index')->name('home');
    });

    Route::group(['prefix' => 'penjualan'], function () {
        Route::get('/index', 'PenjualanController@index');
        Route::get('/data', 'PenjualanController@data');
        Route::get('/data2', 'PenjualanController@listData2')->name('penjualan_detail.data');
        Route::post('/store2', 'PenjualanController@store2')->name('penjualan_detail.store');
        Route::get('/penjualan_detail/loadform/{total}', 'PenjualanController@loadForm');
        Route::post('/store', 'PenjualanController@store')->name('penjualan.store');
        Route::get('/delete/{id}', 'PenjualanController@delete');
    });

    Route::group(['prefix' => 'transaksi'], function () {
        Route::get('/index', 'TransaksiController@index')->name('transaksi');
        Route::get('/data', 'TransaksiController@data');
        Route::get('cetak/{id}', 'TransaksiController@cetak');
    });

});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['manager']], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::get('/profile', 'UserController@profile');
        Route::get('/kelolauser', 'UserController@kelolauser');
        Route::get('/data', 'UserController@data');
        Route::get('/listrole', 'UserController@listrole');
        Route::post('/create', 'UserController@create');
        Route::post('/edit/{id}', 'UserController@edit');
        Route::get('/delete/{id}', 'UserController@delete');
    });

    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/index', 'SupplierController@index');
        Route::get('/data', 'SupplierController@data');
        Route::post('/create', 'SupplierController@create');
        Route::post('/edit/{id}', 'SupplierController@edit');
        Route::get('/delete/{id}', 'SupplierController@delete');
    });

    Route::group(['prefix' => 'stock'], function () {
        Route::get('/index', 'StockController@index');
        Route::get('/data', 'stockController@data');
        Route::post('/create', 'stockController@create');
        Route::post('/edit/{id}', 'stockController@edit');
        Route::get('/delete/{id}', 'stockController@delete');
    });

    Route::group(['prefix' => 'pembelian'], function () {
        Route::get('/', 'PembelianController@index')->name('pembelian.index');
        Route::get('/detail', 'PembelianController@detail')->name('pembelian_detail.index');
        Route::get('/data', 'PembelianController@listData')->name('pembelian.data');
        Route::get('/data2', 'PembelianController@listData2')->name('pembelian_detail.data');
        Route::get('/{id}/tambah', 'PembelianController@create');
        Route::get('/{id}/lihat', 'PembelianController@show');
        Route::post('/store', 'PembelianController@store')->name('pembelian.store');
        Route::post('/store2', 'PembelianController@store2')->name('pembelian_detail.store');
        Route::get('/pembelian_detail/loadform/{diskon}/{total}', 'PembelianController@loadForm');
        Route::get('/delete/{id}', 'PembelianController@delete');
        Route::get('/update/{id}', 'PembelianController@update');
        Route::get('/delete2/{id}', 'PembelianController@delete2');
        //Route::resource('/', 'PembelianController');  
    });

    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/index', 'KategoriController@index');
        Route::get('/data', 'KategoriController@data');
        Route::post('/create', 'KategoriController@create');
        Route::post('/edit/{id}', 'KategoriController@edit');
        Route::get('/delete/{id}', 'KategoriController@delete');
    });

    Route::group(['prefix' => 'menu'], function () {
        Route::get('/index', 'MenuController@index');
        Route::get('/data', 'MenuController@data');
        Route::post('/create', 'MenuController@create');
        Route::post('/edit/{id}', 'MenuController@edit');
        Route::get('/delete/{id}', 'MenuController@delete');
        Route::get('/listkategori', 'MenuController@listkategori');
        Route::get('/listbarang', 'MenuController@listbarang');
        Route::get('/addresep/{id}', 'MenuController@addresep');
        Route::post('/resep/create', 'MenuController@resepcreate');
    });
    
});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['head barista']], function () {

    Route::group(['prefix' => 'stock'], function () {
        Route::get('/index', 'StockController@index');
        Route::get('/data', 'stockController@data');
        Route::post('/create', 'stockController@create');
        Route::post('/edit/{id}', 'stockController@edit');
        Route::get('/delete/{id}', 'stockController@delete');
    });

    Route::group(['prefix' => 'pembelian'], function () {
        Route::get('/', 'PembelianController@index')->name('pembelian.index');
        Route::get('/detail', 'PembelianController@detail')->name('pembelian_detail.index');
        Route::get('/data', 'PembelianController@listData')->name('pembelian.data');
        Route::get('/data2', 'PembelianController@listData2')->name('pembelian_detail.data');
        Route::get('/{id}/tambah', 'PembelianController@create');
        Route::get('/{id}/lihat', 'PembelianController@show');
        Route::post('/store', 'PembelianController@store')->name('pembelian.store');
        Route::post('/store2', 'PembelianController@store2')->name('pembelian_detail.store');
        Route::get('/pembelian_detail/loadform/{diskon}/{total}', 'PembelianController@loadForm');
        Route::get('/delete/{id}', 'PembelianController@delete');
        Route::get('/update/{id}', 'PembelianController@update');
        Route::get('/delete2/{id}', 'PembelianController@delete2');
        //Route::resource('/', 'PembelianController');  
    });

    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/index', 'KategoriController@index');
        Route::get('/data', 'KategoriController@data');
        Route::post('/create', 'KategoriController@create');
        Route::post('/edit/{id}', 'KategoriController@edit');
        Route::get('/delete/{id}', 'KategoriController@delete');
    });

    Route::group(['prefix' => 'menu'], function () {
        Route::get('/index', 'MenuController@index');
        Route::get('/data', 'MenuController@data');
        Route::post('/create', 'MenuController@create');
        Route::post('/edit/{id}', 'MenuController@edit');
        Route::get('/delete/{id}', 'MenuController@delete');
        Route::get('/listkategori', 'MenuController@listkategori');
        Route::get('/listbarang', 'MenuController@listbarang');
        Route::get('/addresep/{id}', 'MenuController@addresep');
        Route::post('/resep/create', 'MenuController@resepcreate');
    });
    
});