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
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@home']);
Route::get('/order', ['as' => 'order', 'uses' => 'HomeController@order']);
Route::get('/profile', ['as' => 'profile', 'uses' => 'HomeController@profile']);

Route::get('/category/{cat1}/{cat2?}', ['as' => 'category', 'uses' => 'HomeController@category']);
