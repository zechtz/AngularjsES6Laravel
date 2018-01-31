<?php
/*
|--------------------------------------------------------------------------
| Reserve Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"]                , function(){
    Route::get('reserve-hierarchies'           , 'Setup\ReserveHierarchiesController@index');
    Route::post('reserve-hierarchies'          , 'Setup\ReserveHierarchiesController@create');
    Route::get('reserve-hierarchies/{id}'      , 'Setup\ReserveHierarchiesController@show');
    Route::put('reserve-hierarchies/{id}'      , 'Setup\ReserveHierarchiesController@update');
    Route::delete('reserve-hierarchies/{id}'   , 'Setup\ReserveHierarchiesController@destroy');

    Route::get('reserve-distributions'         , 'Setup\ReserveDistributionsController@index');
    Route::post('reserve-distributions'        , 'Setup\ReserveDistributionsController@create');
    Route::get('reserve-distributions/{id}'    , 'Setup\ReserveDistributionsController@show');
    Route::put('reserve-distributions/{id}'    , 'Setup\ReserveDistributionsController@update');
    Route::delete('reserve-distributions/{id}' , 'Setup\ReserveDistributionsController@destroy');
});
