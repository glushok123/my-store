<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'catalog', 'as' => 'catalog.'], function () {
    Route::get('/', 'ProductCategorieController@index')->name('index');
});

Route::get('product_images/{filename}', 'ProductCategorieController@displayImage')->name('displayImage');

Route::get('cart', 'CartController@cartList')->name('cart.list');
Route::post('cart', 'CartController@addToCart')->name('cart.store');
Route::post('update-cart', 'CartController@updateCart')->name('cart.update');
Route::post('remove', 'CartController@removeCart')->name('cart.remove'); // you can use delete method
Route::post('clear', 'CartController@clearAllCart')->name('cart.clear'); // you can use delete method

/** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
Route::get('{page}/{subs?}', ['uses' => '\App\Http\Controllers\PageController@index'])
    ->where(['page' => '^(((?=(?!admin))(?=(?!\/)).))*$', 'subs' => '.*']);