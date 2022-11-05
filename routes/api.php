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

Route::get('/books','App\Http\Controllers\BookController@index');
Route::post('/add_book','App\Http\Controllers\BookController@store');
Route::put('/update_book','App\Http\Controllers\BookController@update');
Route::delete('/delete_book/{id}','App\Http\Controllers\BookController@destroy');

Route::get('/read_books','App\Http\Controllers\ReadController@index');
Route::post('/add_read_book','App\Http\Controllers\ReadController@store');
Route::delete('/delete_read_book/{id}','App\Http\Controllers\ReadController@destroy');

Route::get('/want_to_read_books','App\Http\Controllers\WantToReadController@index');
Route::post('/add_want_to_read_book','App\Http\Controllers\WantToReadController@store');
Route::delete('/delete_want_to_read_book/{id}','App\Http\Controllers\WantToReadController@destroy');
