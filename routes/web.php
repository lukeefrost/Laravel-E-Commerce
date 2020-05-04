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
    return view('front/shop');
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

Route::post('addToWishList', 'HomeController@wishlist')->name('addToWishList');

Route::get('/wishList', 'HomeController@viewWishList');

Route::get('/removeWishList/{id}', 'HomeController@removeWishList');

Route::get('/cart/update/{id}', 'CartController@update');

Route::get('selectSize', 'HomeController@selectSize');

Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'admin']], function() {

    Route::get('/', function () {
      return view('admin.index');
    })->name('admin.index');

    Route::POST('admin/store', 'AdminController@store');

    Route::get('/admin', 'AdminController@index');

    Route::resource('product', 'ProductsController');
    Route::resource('category', 'CategoriesController');

    Route::get('ProductEditForm/{id}', 'ProductsController@ProductEditForm')->name('ProductEditForm');

    Route::get('editProducts/{id}', 'ProductsController@editProducts')->name('editProducts');

    Route::get('EditImage/{id}', 'ProductsController@ImageEditForm')->name('ImageEditForm');

    Route::post('editProductImage', 'ProductsController@editProductImage')->name('editProductImage');

    Route::get('/addProperty/{id}', 'ProductsController@addProperty')->name('addProperty');

    Route::post('submitProperty', 'ProductsController@submitProperty')->name('submitProperty');

    Route::post('editProperty', 'ProductsController@editProperty');

    Route::get('addSale', 'ProductsController@addSale');
});

Route::get('/cart/addItem/{id}', 'HomeController@product_details');

Route::get('cart/addItem/{id}', 'CartController@addItem');

Route::get('/cart/remove/{id}', 'CartController@destroy');

Route::put('/cart/update/{id}', 'CartController@update');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/newArrival', 'HomeController@newArrival');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/checkout', 'CheckoutController@index');
    Route::post('/formValidate', 'CheckoutController@formValidate');
    Route::get('/orders', 'ProfileController@orders');
    Route::post('/address', 'ProfileController@address');
    Route::get('/updatePassword', 'ProfileController@updateAddress');
    Route::get('/password', 'ProfileController@updatePassword');
    Route::post('/updatePassword', 'ProfileController@updatePassword');

    Route::get('/profile', function() {
        return view('profile.index');
    });

    Route::get('/thankyou', function() {
        return view('/profile/thankyou');
    });
});
