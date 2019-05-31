<?php

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

Route::get('/instant-offers', 'InstantOfferController@index');
Route::post('/instant-offers', 'InstantOfferController@store');
Route::get('/instant-offers/{instantOffer}', 'InstantOfferController@show');
Route::patch('/instant-offers/{instantOffer}', 'InstantOfferController@update');
Route::delete('/instant-offers/{instantOffer}', 'InstantOfferController@destroy');