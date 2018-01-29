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
});

Route::group(["prefix" => "v1"], function(){
    Route::get('loation_hierarchies'           , 'Setup\LocationHierarchiesController@index');
    Route::post('loation_hierarchies'          , 'Setup\LocationHierarchiesController@create');
    Route::get('loation_hierarchies/{id}'      , 'Setup\LocationHierarchiesController@show');
    Route::put('loation_hierarchies/{id}'      , 'Setup\LocationHierarchiesController@update');
    Route::delete('loation_hierarchies/{id}'   , 'Setup\LocationHierarchiesController@destroy');
});
