<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
    
});

Auth::routes([
    'register'=>false,
    'reset' => false
]);
Route::get('/', 'HomeController@index');
Route::get('/kategori/{id}', 'HomeController@kategori');
Route::get('/produk/{id}', 'HomeController@produk');

// ADMIN ROUTE
Route::get('/administrator', 'AdminController@index')->name('admin');
Route::get('/administrator/banner', 'AdminController@banner');
Route::get('/administrator/gambar_prod', 'AdminController@gam_prod');

//Kategori Route
Route::get('/administrator/kategori', 'AdminController@kategori')->name('kategori');
Route::post('/administrator/kategori/del', 'AdminController@kategori_del');
Route::post('/administrator/kategori/add', 'AdminController@kategori_add');
Route::post('/administrator/kategori/edit', 'AdminController@kategori_edit');


//Produk Route
Route::get('/administrator/produk', 'AdminController@produk')->name('produk');
Route::get('/administrator/produk/detail/{id}', 'AdminController@produk_detail');
Route::get('/administrator/produk/edit/{id}', 'AdminController@produk_edit');
Route::get('/administrator/produk/add', 'AdminController@produk_add');
Route::post('/administrator/produk/del', 'AdminController@produk_del');
Route::post('/administrator/produk/add_post', 'AdminController@produk_add_post');
Route::post('/administrator/produk/edit_post', 'AdminController@produk_edit_post');