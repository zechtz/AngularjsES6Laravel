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
    Route::get('location-hierarchies'         , 'Setup\LocationHierarchiesController@index');
    Route::post('location-hierarchies'        , 'Setup\LocationHierarchiesController@create');
    Route::get('location-hierarchies/{id}'    , 'Setup\LocationHierarchiesController@show');
    Route::put('location-hierarchies/{id}'    , 'Setup\LocationHierarchiesController@update');
    Route::delete('location-hierarchies/{id}' , 'Setup\LocationHierarchiesController@destroy');

    Route::get('locations'           , 'Setup\LocationsController@index');
    Route::post('locations'          , 'Setup\LocationsController@create');
    Route::get('locations/{id}/edit' , 'Setup\LocationsController@edit');
    Route::get('locations/{id}'      , 'Setup\LocationsController@show');
    Route::put('locations/{id}'      , 'Setup\LocationsController@update');
    Route::delete('locations/{id}'   , 'Setup\LocationsController@destroy');
});
