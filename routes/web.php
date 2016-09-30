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
