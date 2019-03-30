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

Route::get('/', 'HomeController@index')->name('home');


Auth::routes();

//Route::get('/home', 'HomeController@home')->name('home');
Route::get('/products/{products}', 'ProductsController@show')->name('products.single');
Route::get('/news/{id}', 'NewsController@show')->name('news.show');
Route::get('/categories/{id}', 'CategoriesController@show')->name('categories.show');
Route::get('/cart', 'CartController@step1')->name('cart.step1');
Route::get('/cart/add/{products}', 'CartController@addToCart')->name('cart.addToCart');
Route::get('/cart/confirm', 'CartController@step2')->name('cart.step2');
Route::post('/search', 'ProductsController@search')->name('products.search');

//'middleware' => ['auth']]
Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductsController@index')->name('products');
    Route::get('/create', 'ProductsController@create')->name('products.create');
    Route::post('/store', 'ProductsController@store')->name('products.store');
    Route::get('/edit/{products}', 'ProductsController@edit')->name('products.edit');
    Route::post('/update/{id}', 'ProductsController@update')->name('products.update');
    Route::get('/destroy/{id}', 'ProductsController@destroy')->name('products.destroy');
});


