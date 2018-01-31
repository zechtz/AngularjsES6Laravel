<?php
/*
|--------------------------------------------------------------------------
| Unit Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"], function(){
    Route::get('units'           , 'Setup\UnitsController@index');
    Route::post('units'          , 'Setup\UnitsController@create');
    Route::get('units/{id}'      , 'Setup\UnitsController@show');
    Route::get('units/{id}/edit' , 'Setup\UnitsController@edit');
    Route::put('units/{id}'      , 'Setup\UnitsController@update');
    Route::delete('units/{id}'   , 'Setup\UnitsController@destroy');
});
