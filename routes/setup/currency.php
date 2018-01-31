<?php

/*
|--------------------------------------------------------------------------
| Currency Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"], function(){
    Route::get('currencies'           , 'Setup\CurrenciesController@index');
    Route::post('currencies'          , 'Setup\CurrenciesController@create');
    Route::get('currencies/{id}'      , 'Setup\CurrenciesController@show');
    Route::get('currencies/{id}/edit' , 'Setup\CurrenciesController@edit');
    Route::put('currencies/{id}'      , 'Setup\CurrenciesController@update');
    Route::delete('currencies/{id}'   , 'Setup\CurrenciesController@destroy');
});
