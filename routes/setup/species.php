<?php
/*
|--------------------------------------------------------------------------
| Species Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"], function(){
    Route::get('specie-categories'           , 'Setup\SpecieCategoriesController@index');
    Route::post('specie-categories'          , 'Setup\SpecieCategoriesController@create');
    Route::get('specie-categories/{id}'      , 'Setup\SpecieCategoriesController@show');
    Route::get('specie-categories/{id}/edit' , 'Setup\SpecieCategoriesController@edit');
    Route::put('specie-categories/{id}'      , 'Setup\SpecieCategoriesController@update');
    Route::delete('specie-categories/{id}'   , 'Setup\SpecieCategoriesController@destroy');

    Route::get('species'           , 'Setup\SpeciesController@index');
    Route::post('species'          , 'Setup\SpeciesController@create');
    Route::get('species/{id}'      , 'Setup\SpeciesController@show');
    Route::get('species/{id}/edit' , 'Setup\SpeciesController@edit');
    Route::put('species/{id}'      , 'Setup\SpeciesController@update');
    Route::delete('species/{id}'   , 'Setup\SpeciesController@destroy');
});
