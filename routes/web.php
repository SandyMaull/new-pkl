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
// Route::get('/home', 'HomeController@index2')->name('home');
Route::get('/administrator', 'AdminController@index')->name('admin');