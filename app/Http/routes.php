<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'StoreController@getindex');
Route::controller('admin/category', 'CategoriesController');
Route::controller('admin/product', 'ProductsController');
Route::controller('store', 'StoreController');
Route::get('/auth/logout', 'AuthController@logout');
Route::get('/auth/google','AuthController@login');
Route::get('/profile', function(){
	$user = Socialize::with('google')->user();
});

