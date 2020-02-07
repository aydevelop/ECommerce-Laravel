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

Route::group(['middleware' => 'admin'], function () {
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::resource('admin/products', 'ProductsController');
    Route::resource('image', 'ImageController');
    Route::resource('admin/orders', 'OrderController');
    Route::resource('admin/callbacks', 'CallbackController');
    Route::get('admin', function () { return redirect()->to('/admin/products'); });
});

Route::get('register', 'AuthController@register');
Route::post('register', 'AuthController@postRegister');
Route::get('register/confirm/{token}', 'AuthController@confirmEmail');
Route::get('login', 'AuthController@login')->middleware('guest')->name('login');
Route::post('login', 'AuthController@postLogin')->middleware('guest');
Route::get('logout', 'AuthController@logout');


Route::group(['namespace' => 'Front'], function() {
    Route::get('products/{category?}', 'HomeController@products');
    Route::get('product/{product}', 'HomeController@product');
    Route::post('search', 'HomeController@search');
    Route::get('checkout', 'HomeController@checkout')->middleware('auth');
    Route::get('orders', 'HomeController@orders')->middleware('auth');
    Route::post('orderCreate', 'HomeController@orderCreate');
    Route::post('callbackCreate', 'HomeController@callbackCreate');

    Route::get('card', 'CardController@index')->middleware('auth');
    Route::post('card', 'CardController@store')->middleware('auth');
    Route::delete('card', 'CardController@destroy');

    Route::get('account', 'AccountController@show')->middleware('auth');
    Route::post('account', 'AccountController@update')->middleware('auth');
});

Route::get('aboutus', function(){ return view("front.aboutus"); });
Route::get('contactus', function(){ return view("front.contactus"); });

Route::get('/', function () {
    return redirect()->to('/products');
});

Route::post('paypal', 'PaymentController@payWithpaypal');
Route::get('status', 'PaymentController@getPaymentStatus');
