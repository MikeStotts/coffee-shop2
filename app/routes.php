<?php

Route::get('/', function () { return Redirect::to('home'); });

// Home resource
Route::resource('home', 'HomeController',
	['only' => 'index']);

// Login process resource
Route::resource('login', 'LoginController',
	['only' => ['index', 'store']]);

// Logoff process resource
Route::resource('logoff', 'LogoffController',
	['only' => 'index']);

// User resource
Route::resource('user', 'UserController',
	['except' => 'destroy']);

// Product resource
Route::get('/product/{id}/delete', 'ProductController@getDelete' );

Route::resource('product', 'ProductController');

// Cart resource
Route::get('/user/{user}/cart/{cart}/delete', 'CartController@getDelete' );

Route::resource('user.cart', 'CartController');

// Order resource
Route::resource('order', 'OrderController');

// OrderItem resource
Route::resource('orderitem', 'OrderItemController');

// Checkout process resource
Route::resource('checkout', 'CheckoutController',
	['only' => ['index', 'store']]);
?>
