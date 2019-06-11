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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/create_balance', 'HomeController@create_balance');

Route::get('/transaction', 'TransactionController@index');
Route::post('/transaction/transfer', 'TransactionController@transfer');
Route::post('/transaction/topup', 'TransactionController@topup');

Route::get('/history','HistoryController@index');
