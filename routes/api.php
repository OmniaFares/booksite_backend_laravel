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
