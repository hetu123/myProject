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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('category', 'admin\CategoryController@index');
Route::resource('addcategory','admin\CategoryController');
Route::resource('product','admin\ProductController');
Route::resource('user','admin\UserController');
Route::resource('productimage','admin\ImageController');
Route::get('importExport', 'admin\MaatwebsiteDemoController@importExport');

Route::get('downloadExcel/{type}', 'admin\MaatwebsiteDemoController@downloadExcel');

Route::post('importExcel', 'admin\MaatwebsiteDemoController@importExcel');
