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

Route::get('/products', function() {
    return view('front.shop');
});

Route::get('/product_details/{id}', 'HomeController@product_details');

Route::get('/cart', 'CartController@index');

Route::get('/cart/addItem/{id}', 'CartController@addItem');

Route::get('/shop', 'HomeController@shop');

//Route::get('/products', function() {
    //return view('front/shop');
//});

//Route::get('/shop', 'HomeController@shop');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('home', 'HomeController@contact')->name('contactus');

Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'admin']], function() {

    Route::get('/', function () {
      return view('admin.index');
    })->name('admin.index');

    Route::POST('admin/store', 'AdminController@store');

    Route::get('/admin', 'AdminController@index');

    Route::resource('product', 'ProductsController');
});

Route::get('/cart/addItem/{id}', 'HomeController@product_details');

Route::get('cart/addItem/{id}', 'CartController@addItem');

Route::get('/cart/remove/{id}', 'CartController@destroy');
