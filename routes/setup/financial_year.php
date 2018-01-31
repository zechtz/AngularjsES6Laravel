<?php

/*
|--------------------------------------------------------------------------
| Financial Year Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"], function(){
    Route::get('financial-years'           , 'Setup\FinancialYearController@index');
    Route::post('financial-years'          , 'Setup\FinancialYearController@create');
    Route::get('financial-years/{id}'      , 'Setup\FinancialYearController@show');
    Route::get('financial-years/{id}/edit' , 'Setup\FinancialYearController@edit');
    Route::put('financial-years/{id}'      , 'Setup\FinancialYearController@update');
    Route::delete('financial-years/{id}'   , 'Setup\FinancialYearController@destroy');
});
