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

// Route::get('/', function () {
//     return view('welcome');
// });


// Example: Basic route

// Route::get('/', function () {
//     return 'Hello, World!';
// });


// Example: Sample website

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('about', function () {
//     return view('about');
// });

// Route::get('products', function () {
//     return view('products');
// });

// Route::get('services', function () {
//     return view('services');
// });


// Example: Route verbs

// Route::get('/', function () {
//     return 'Hello, World!';
// });

// Route::post('/', function () {});

// Route::put('/', function () {});

// Route::delete('/', function () {});

// Route::any('/', function () {});

// Route::match(['get', 'post'], '/', function () {});


// Example: Controller method

Route::get('/', 'WelcomeController@index');