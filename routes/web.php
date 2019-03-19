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
    return view('welcome');
});
//Route::get('/','UserController@delete');

//Route::get('/register','UserController@register');
//Route::get('/delete','UserController@delete');
//Route::get('/update','UserController@update');

Auth::routes();
//'middleware' => ['auth']]
Route::group(['prefix' => 'products'],  function () {
    Route::get('/', 'ProductsController@index')->name('products');
    Route::get('/create', 'ProductsController@create')->name('products.create');
    Route::post('/store', 'ProductsController@store')->name('products.store');
    Route::get('/edit/{products}', 'ProductsController@edit')->name('products.edit');
    Route::post('/update/{id}', 'ProductsController@update')->name('products.update');
    Route::get('/destroy/{id}', 'ProductsController@destroy')->name('products.destroy');
});

