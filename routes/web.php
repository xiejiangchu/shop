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

// // only users with roles that have the 'manage_posts' permission will be able to access any route within admin/post
// Entrust::routeNeedsPermission('admin/post*', 'create-post');

// // only owners will have access to routes within admin/advanced
// Entrust::routeNeedsRole('admin/advanced*', 'owner');

// // optionally the second parameter can be an array of permissions or roles
// // user would need to match all roles or permissions for that route
// Entrust::routeNeedsPermission('admin/post*', array('create-post', 'edit-comment'));
// Entrust::routeNeedsRole('admin/advanced*', array('owner','writer'));

Auth::routes();
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@home']);
Route::get('/order', ['as' => 'order', 'uses' => 'HomeController@order']);
Route::get('/profile', ['as' => 'profile', 'uses' => 'HomeController@profile']);

Route::any('/category/{cat1}/{cat2?}/{page?}', ['as' => 'category', 'uses' => 'HomeController@category']);

Route::group(['prefix' => 'cart', 'middleware' => ['auth', 'role:person']], function () {
    Route::any('/add', ['as' => 'cart.add', 'uses' => 'ShoppingCartController@add']);
    Route::any('/sub', ['as' => 'cart.sub', 'uses' => 'ShoppingCartController@sub']);
});

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
    Route::any('/', ['as' => 'admin', 'uses' => 'HomeController@index']);

    Route::resource('/user', 'UserController');
    Route::resource('/role', 'RoleController');
    Route::resource('/permission', 'PermissionController');

    Route::any('/goods', ['as' => 'admin.goods', 'uses' => 'GoodsController@index']);
    Route::any('/category', ['as' => 'admin.category', 'uses' => 'CategoryController@index']);
});
