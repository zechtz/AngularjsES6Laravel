<?php

/*
|--------------------------------------------------------------------------
| Meteorogical Detail Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"]              , function(){
    Route::get('meteorological-details'           , 'Setup\MeteorologicalDetailsController@index');
    Route::post('meteorological-details'          , 'Setup\MeteorologicalDetailsController@create');
    Route::get('meteorological-details/{id}'      , 'Setup\MeteorologicalDetailsController@show');
    Route::get('meteorological-details/{id}/edit' , 'Setup\MeteorologicalDetailsController@edit');
    Route::put('meteorological-details/{id}'      , 'Setup\MeteorologicalDetailsController@update');
    Route::delete('meteorological-details/{id}'   , 'Setup\MeteorologicalDetailsController@destroy');
});
