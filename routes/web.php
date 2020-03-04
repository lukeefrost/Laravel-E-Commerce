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

Route::get('home', function() {
    return view('front/home');
});

Route::get('/shop', function() {
    return view('front/shop');
});

Route::get('/contact', function() {
    return view('front/contact');
});

//Route::get('/products', function() {
    //return view('front/shop');
//});

//Route::get('/shop', 'HomeController@shop');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('home', 'HomeController@contact')->name('contactus');

Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'admin']],
  function() {
    Route::get('/', function () {
      return view('admin.index');
    })->name('admin.index');

    Route::resource('product', 'ProductController');
  });
