<?php

/*
|--------------------------------------------------------------------------
| Merit Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"] , function(){
    Route::get('merits'             , 'Setup\MeritsController@index');
    Route::post('merits'            , 'Setup\MeritsController@create');
    Route::get('merits/{id}'        , 'Setup\MeritsController@show');
    Route::put('merits/{id}'        , 'Setup\MeritsController@update');
    Route::delete('merits/{id}'     , 'Setup\MeritsController@destroy');
});
