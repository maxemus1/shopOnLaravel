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
Route::get('/products/{products}', 'ProductsController@show')->name('products.single');
Route::get('/news', 'NewsController@index')->name('news.index');
Route::get('/news/{id}', 'NewsController@show')->name('news.show');
Route::get('/categories/{id}', 'CategoriesController@show')->name('categories.show');
Route::get('/cart', 'CartController@step')->name('cart.step');
Route::get('/cart/add/{products}', 'CartController@addToCart')->name('cart.addToCart');
Route::post('/search', 'ProductsController@search')->name('products.search');
Route::get('/about_company', 'HomeController@aboutСompany')->name('about_company');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');




//Временное будет использоваться для админки
Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductsController@index')->name('products');
    Route::get('/create', 'ProductsController@create')->name('products.create');
    Route::post('/store', 'ProductsController@store')->name('products.store');
    Route::get('/edit/{products}', 'ProductsController@edit')->name('products.edit');
    Route::post('/update/{id}', 'ProductsController@update')->name('products.update');
    Route::get('/destroy/{id}', 'ProductsController@destroy')->name('products.destroy');
});
