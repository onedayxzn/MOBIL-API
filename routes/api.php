<?php

use App\Http\Controllers\MobilController;
use Illuminate\Http\Request;

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



//Akun
Route::get('/akuns', 'AkunController@get');
Route::get('/akun/{id}', 'AkunController@getById');
Route::post('/akun', 'AkunController@post');
Route::put('/akun/{id}', 'AkunController@put');
Route::delete('/akun/{id}', 'AkunController@delete');



//mobil
Route::get('/mobils', 'MobilController@get');
Route::get('/mobil/{id}', 'MobilController@getById');
Route::post('/mobil', 'MobilController@post');
Route::put('/mobil/{id}', 'MobilController@put');
Route::delete('/mobil/{id}', 'MobilController@delete');

//transaksi
Route::get('/transaksis', 'TransaksiController@get');
Route::get('/transaksi/{id}', 'TransaksiController@getById');
Route::post('/transaksi', 'TransaksiController@post');
Route::put('/transaksi/{id}', 'TransaksiController@put');
Route::delete('/transaksi/{id}', 'TransaksiController@delete');
