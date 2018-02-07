<?php

/*
|--------------------------------------------------------------------------
| Tarrif Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"], function(){
    Route::get('tarrifs'                             ,  'Setup\TarrifsController@index');
    Route::post('tarrifs'                            ,  'Setup\TarrifsController@create');
    Route::get('tarrifs/{id}'                        ,  'Setup\TarrifsController@show');
    Route::get('tarrifs/{id}/edit'                   ,  'Setup\TarrifsController@edit');
    Route::put('tarrifs/{id}'                        ,  'Setup\TarrifsController@update');
    Route::delete('tarrifs/{id}'                     ,  'Setup\TarrifsController@destroy');

    Route::get('tarrif-distributions'                ,  'Setup\TarrifDistributionsController@index');
    Route::post('tarrif-distributions'               ,  'Setup\TarrifDistributionsController@create');
    Route::get('tarrif-distributions/{id}'           ,  'Setup\TarrifDistributionsController@show');
    Route::get('tarrif-distributions/{id}/edit'      ,  'Setup\TarrifDistributionsController@edit');
    Route::put('tarrif-distributions/{id}'           ,  'Setup\TarrifDistributionsController@update');
    Route::delete('tarrif-distributions/{id}'        ,  'Setup\TarrifDistributionsController@destroy');

    Route::get('tarrif-distribution-rates'           ,  'Setup\TarrifDistributionRatesController@index');
    Route::post('tarrif-distribution-rates'          ,  'Setup\TarrifDistributionRatesController@create');
    Route::get('tarrif-distribution-rates/{id}'      ,  'Setup\TarrifDistributionRatesController@show');
    Route::get('tarrif-distribution-rates/{id}/edit' ,  'Setup\TarrifDistributionRatesController@edit');
    Route::put('tarrif-distribution-rates/{id}'      ,  'Setup\TarrifDistributionRatesController@update');
    Route::delete('tarrif-distribution-rates/{id}'   ,  'Setup\TarrifDistributionRatesController@destroy');

    Route::get('tarrif-fees'                         ,  'Setup\TarrifFeesController@index');
    Route::post('tarrif-fees'                        ,  'Setup\TarrifFeesController@create');
    Route::get('tarrif-fees/{id}'                    ,  'Setup\TarrifFeesController@show');
    Route::get('tarrif-fees/{id}/edit'               ,  'Setup\TarrifFeesController@edit');
    Route::put('tarrif-fees/{id}'                    ,  'Setup\TarrifFeesController@update');
    Route::delete('tarrif-fees/{id}'                 ,  'Setup\TarrifFeesController@destroy');
});
