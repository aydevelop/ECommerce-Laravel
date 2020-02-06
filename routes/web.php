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
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/categories', 'AdminCategoriesController');
    Route::resource('/admin/products', 'ProductsController');
    Route::resource('/image', 'ImageController');
    Route::resource('/admin/orders', 'OrderController');
    Route::resource('/admin/callbacks', 'CallbackController');
});

Route::get('register', 'AuthController@register');
Route::post('register', 'AuthController@postRegister');
Route::get('register/confirm/{token}', 'AuthController@confirmEmail');
Route::get('login', 'AuthController@login')->middleware('guest');
Route::post('login', 'AuthController@postLogin')->middleware('guest');
Route::get('logout', 'AuthController@logout');


Route::group(['namespace' => 'Front'], function() {
    Route::get('products/{category?}', 'HomeController@products');
    Route::get('product/{product}', 'HomeController@product');
    Route::post('search', 'HomeController@search');
});


Route::get('/', function () {
    //return Auth::user()->role->name;
    return view('welcome');
});
