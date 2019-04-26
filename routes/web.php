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
    return redirect()->route('home');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductsController@index')->name('index');

Route::get('/products/{product}', 'ProductsController@show')->name('show');

Route::post('/products/{product}', 'ReviewsController@store')->name('review.post');

Route::get('/search', 'SearchController@show')->name('show');

Route::get('/cart', 'CartController@index')->name('cart.index');

Route::get('/cart/show', 'CartController@show')->name('cart.show');

Route::post('/cart', 'CartController@store')->name('cart.store');

Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');

Route::post('/cart/checkout', 'CartController@pay')->name('cart.pay');

Route::delete('/cart/delete/{id}','CartController@destroy');

Route::get('/checkout', 'ProductsController@checkout')->name('checkout');

Route::get('/thankyou', 'ProductsController@thankyou')->name('thankyou');

});

	Route::get('/products/edit/{product}', 'ProductsController@edit');

	Route::patch('/products/edit/{product}', 'ProductsController@update');

Route::prefix('admin')->group(function(){

	Route::get('/register', 'Auth\AdminLoginController@showRegisterForm')->name('admin.register');

	Route::post('/register', 'Auth\AdminLoginController@register')->name('admin.register.submit');

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

	

	Route::get('/', 'AdminController@index')->name('admin.dashboard');

	Route::get('/admin/search', 'SearchController@adminshow')->name('admin.show');

	Route::get('/customers', 'AdminController@customers')->name('admin.customers');

	Route::get('/customers/{user}', 'AdminController@show')->name('admin.customers.show');

	Route::patch('/increase/{product}', 'ProductsController@increase');

	Route::patch('/decrease/{product}', 'ProductsController@decrease');


});

