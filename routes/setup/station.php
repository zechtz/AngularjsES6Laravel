<?php
/*
|--------------------------------------------------------------------------
| Station Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"], function(){
    Route::get('station-categories'           , 'Setup\StationCategoriesController@index');
    Route::post('station-categories'          , 'Setup\StationCategoriesController@create');
    Route::get('station-categories/{id}'      , 'Setup\StationCategoriesController@show');
    Route::get('station-categories/{id}/edit' , 'Setup\StationCategoriesController@edit');
    Route::put('station-categories/{id}'      , 'Setup\StationCategoriesController@update');
    Route::delete('station-categories/{id}'   , 'Setup\StationCategoriesController@destroy');

    Route::get('stations'           , 'Setup\StationsController@index');
    Route::post('stations'          , 'Setup\StationsController@create');
    Route::get('stations/{id}'      , 'Setup\StationsController@show');
    Route::get('stations/{id}/edit' , 'Setup\StationsController@edit');
    Route::put('stations/{id}'      , 'Setup\StationsController@update');
    Route::delete('stations/{id}'   , 'Setup\StationsController@destroy');
});
