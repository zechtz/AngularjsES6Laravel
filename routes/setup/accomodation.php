<?php
/*
|--------------------------------------------------------------------------
| Trophy Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"], function(){
    Route::get('trophies'           , 'Setup\TrophiesController@index');
    Route::post('trophies'          , 'Setup\TrophiesController@create');
    Route::get('trophies/{id}'      , 'Setup\TrophiesController@show');
    Route::get('trophies/{id}/edit' , 'Setup\TrophiesController@edit');
    Route::put('trophies/{id}'      , 'Setup\TrophiesController@update');
    Route::delete('trophies/{id}'   , 'Setup\TrophiesController@destroy');
});
