<?php
/*
|--------------------------------------------------------------------------
| Country & Country Group Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"]           , function(){
    Route::get('country-groups'           , 'Setup\CountryGroupsController@index');
    Route::post('country-groups'          , 'Setup\CountryGroupsController@create');
    Route::get('country-groups/{id}'      , 'Setup\CountryGroupsController@show');
    Route::get('country-groups/{id}/edit' , 'Setup\CountryGroupsController@edit');
    Route::put('country-groups/{id}'      , 'Setup\CountryGroupsController@update');
    Route::delete('country-groups/{id}'   , 'Setup\CountryGroupsController@destroy');

    Route::get('countries'                , 'Setup\CountriesController@index');
    Route::post('countries'               , 'Setup\CountriesController@create');
    Route::get('countries/{id}'           , 'Setup\CountriesController@show');
    Route::get('countries/{id}/edit'      , 'Setup\CountriesController@edit');
    Route::put('countries/{id}'           , 'Setup\CountriesController@update');
    Route::delete('countries/{id}'        , 'Setup\CountriesController@destroy');
});
