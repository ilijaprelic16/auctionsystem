<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products','ApiControllers\ProductController@index')->name('productss');
Route::get('/products/{product}','ApiControllers\ProductController@show')->name('product');

Route::post('/products','ApiControllers\ProductController@store')->name('store.product');
Route::put('/products/{product}','ApiControllers\ProductController@update')->name('update.product');
Route::delete('/products/{product}','App\Http\Controllers\ApiControllers\ollers\ProductController@destroy')->name('delete.product');

