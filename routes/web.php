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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'product', 'middleware' => ['auth']], function () {

    Route::get('/index', 'ProductController@index')->name('product.index');
    Route::post('/store', 'ProductController@store')->name('product.store');
    Route::get('/create', 'ProductController@create')->name('product.create');
    Route::get('/delete/{id}', 'ProductController@delete')->name('product.delete');
});
