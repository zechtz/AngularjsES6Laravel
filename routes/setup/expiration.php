<?php

/*
|--------------------------------------------------------------------------
| Expiration Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"], function(){
    Route::get('expirations'           , 'Setup\ExpirationController@index');
    Route::post('expirations'          , 'Setup\ExpirationController@create');
    Route::get('expirations/{id}'      , 'Setup\ExpirationController@show');
    Route::get('expirations/{id}/edit' , 'Setup\ExpirationController@edit');
    Route::put('expirations/{id}'      , 'Setup\ExpirationController@update');
    Route::delete('expirations/{id}'   , 'Setup\ExpirationController@destroy');
});
