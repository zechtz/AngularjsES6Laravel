<?php

/*
|--------------------------------------------------------------------------
| Plot Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"] , function(){
    Route::get('plots'          , 'Setup\PlotsController@index');
    Route::post('plots'         , 'Setup\PlotsController@create');
    Route::get('plots/{id}'     , 'Setup\PlotsController@show');
    Route::put('plots/{id}'     , 'Setup\PlotsController@update');
    Route::delete('plots/{id}'  , 'Setup\PlotsController@destroy');
});
