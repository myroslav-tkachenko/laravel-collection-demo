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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::resource('items', 'ItemsController');
});

Route::get('login', 'SessionController@login')->name('login');
Route::post('login', 'SessionController@check');
Route::get('logout', 'SessionController@logout')->name('logout');
