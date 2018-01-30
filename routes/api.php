<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::get('/', function () {
    return view('index');
});

Route::group(["prefix" => "v1"], function(){
    Route::get('institutions'           , 'Setup\InstitutionsController@index');
    Route::post('institutions'          , 'Setup\InstitutionsController@create');
    Route::get('institutions/{id}'      , 'Setup\InstitutionsController@show');
    Route::get('institutions/{id}/edit' , 'Setup\InstitutionsController@edit');
    Route::put('institutions/{id}'      , 'Setup\InstitutionsController@update');
    Route::delete('institutions/{id}'   , 'Setup\InstitutionsController@destroy');
    Route::get('station-categories'           , 'Setup\StationCategoriesController@index');
    Route::post('station-categories'          , 'Setup\StationCategoriesController@create');
    Route::get('station-categories/{id}'      , 'Setup\StationCategoriesController@show');
    Route::get('station-categories/{id}/edit' , 'Setup\StationCategoriesController@edit');
    Route::put('station-categories/{id}'      , 'Setup\StationCategoriesController@update');
    Route::delete('station-categories/{id}'   , 'Setup\StationCategoriesController@destroy');
});
