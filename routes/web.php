<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'ShopController@index');

Route::get('/comprar', 'ShopController@get_payment');

Route::post('/comprar', 'ShopController@post_payment');

Route::get('/producto/{slug}', 'ShopController@detail');

//admin
Route::get('/admin', 'AdminController@index');
Route::get('/admin/products', 'AdminController@list_products');
Route::get('/admin/products/new', 'AdminController@new_product');
Route::post('/admin/products/new', 'AdminController@create_product');
Route::get('/admin/products/{id}/edit', 'AdminController@edit_product');
Route::put('/admin/products/{id}/edit', 'AdminController@update_product');
Route::delete('/admin/products/{id}/destroy', 'AdminController@destroy_product');
Route::get('/admin/sales', 'AdminController@list_sales');
