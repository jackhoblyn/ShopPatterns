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

Route::get('/products', 'ProductsController@index')->name('index');

Route::get('/products/{product}', 'ProductsController@show')->name('show');

Route::get('/search', 'SearchController@show')->name('show');

Route::get('/cart', 'CartController@index')->name('cart.index');

Route::get('/cart/show', 'CartController@show')->name('cart.show');

Route::post('/cart', 'CartController@store')->name('cart.store');

Route::get('/checkout', 'ProductsController@checkout')->name('checkout');

Route::get('/thankyou', 'ProductsController@thankyou')->name('thankyou');



Route::prefix('admin')->group(function(){

	Route::get('/register', 'Auth\AdminLoginController@showRegisterForm')->name('admin.register');

	Route::post('/register', 'Auth\AdminLoginController@register')->name('admin.register.submit');

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

	Route::get('/', 'AdminController@index')->name('admin.dashboard');

});

