<?php

/*
|--------------------------------------------------------------------------
| Location Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"]              , function(){
    Route::get('loation-hierarchies'         , 'Setup\LocationHierarchiesController@index');
    Route::post('loation-hierarchies'        , 'Setup\LocationHierarchiesController@create');
    Route::get('loation-hierarchies/{id}'    , 'Setup\LocationHierarchiesController@show');
    Route::put('loation-hierarchies/{id}'    , 'Setup\LocationHierarchiesController@update');
    Route::delete('loation-hierarchies/{id}' , 'Setup\LocationHierarchiesController@destroy');

    Route::get('loations'                    , 'Setup\LocationsController@index');
    Route::post('loations'                   , 'Setup\LocationsController@create');
    Route::get('loations/{id}'               , 'Setup\LocationsController@show');
    Route::put('loations/{id}'               , 'Setup\LocationsController@update');
    Route::delete('loations/{id}'            , 'Setup\LocationsController@destroy');
});
