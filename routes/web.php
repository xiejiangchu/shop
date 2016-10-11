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
Route::get('/profile', ['as' => 'profile', 'uses' => 'HomeController@profile']);

Route::any('/category/{cat1}/{cat2?}/{page?}', ['as' => 'category', 'uses' => 'HomeController@category']);

Route::group(['middleware' => ['auth', 'role:person']], function () {
    Route::resource('address', 'AddressController');
    Route::post('/address/default', ['as' => 'address.default', 'uses' => 'AddressController@default']);
    Route::resource('order', 'OrderController');
    Route::get('/order/unpaid', ['as' => 'order.unpaid', 'uses' => 'OrderController@unpaid']);
    Route::get('/order/unship', ['as' => 'order.unship', 'uses' => 'OrderController@unship']);
    Route::get('/order/history', ['as' => 'order.history', 'uses' => 'OrderController@history']);
});

Route::group(['prefix' => 'cart', 'middleware' => ['auth', 'role:person']], function () {
    Route::any('/add', ['as' => 'cart.add', 'uses' => 'ShoppingCartController@add']);
    Route::any('/sub', ['as' => 'cart.sub', 'uses' => 'ShoppingCartController@sub']);
    Route::any('/calc', ['as' => 'cart.calc', 'uses' => 'ShoppingCartController@calc']);
    Route::any('/clear', ['as' => 'cart.clear', 'uses' => 'ShoppingCartController@clear']);
    Route::any('/cart', ['as' => 'cart.cart', 'uses' => 'ShoppingCartController@cart']);
    Route::any('/cartShort', ['as' => 'cart.cartShort', 'uses' => 'ShoppingCartController@cartShort']);
    Route::any('/details', ['as' => 'cart.details', 'uses' => 'ShoppingCartController@details']);
});

Route::resource('/search', 'SearchController');

Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
    Route::any('/', ['as' => 'admin', 'uses' => 'HomeController@index']);

    Route::resource('/user', 'UserController');
    Route::post('/user/{id}/lock', ['as' => 'user.lock', 'uses' => 'UserController@lock']);
    Route::post('/user/{id}/verified', ['as' => 'user.verified', 'uses' => 'UserController@verified']);

    Route::resource('/role', 'RoleController');
    Route::resource('/permission', 'PermissionController');

    Route::any('/goods', ['as' => 'admin.goods', 'uses' => 'GoodsController@index']);
    Route::any('/category', ['as' => 'admin.category', 'uses' => 'CategoryController@index']);
});
