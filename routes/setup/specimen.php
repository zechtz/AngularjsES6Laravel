<?php
/*
|--------------------------------------------------------------------------
| Specimen Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"], function(){
    Route::get('specimen-types'           , 'Setup\SpecimenTypesController@index');
    Route::post('specimen-types'          , 'Setup\SpecimenTypesController@create');
    Route::get('specimen-types/{id}'      , 'Setup\SpecimenTypesController@show');
    Route::get('specimen-types/{id}/edit' , 'Setup\SpecimenTypesController@edit');
    Route::put('specimen-types/{id}'      , 'Setup\SpecimenTypesController@update');
    Route::delete('specimen-types/{id}'   , 'Setup\SpecimenTypesController@destroy');
});
