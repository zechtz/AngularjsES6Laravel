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

    Route::get('country_groups'           , 'Setup\CountryGroupsController@index');
    Route::post('country_groups'          , 'Setup\CountryGroupsController@create');
    Route::get('country_groups/{id}'      , 'Setup\CountryGroupsController@show');
    Route::get('country_groups/{id}/edit' , 'Setup\CountryGroupsController@edit');
    Route::put('country_groups/{id}'      , 'Setup\CountryGroupsController@update');
    Route::delete('country_groups/{id}'   , 'Setup\CountryGroupsController@destroy');

    Route::get('countries'           , 'Setup\CountriesController@index');
    Route::post('countries'          , 'Setup\CountriesController@create');
    Route::get('countries/{id}'      , 'Setup\CountriesController@show');
    Route::get('countries/{id}/edit' , 'Setup\CountriesController@edit');
    Route::put('countries/{id}'      , 'Setup\CountriesController@update');
    Route::delete('countries/{id}'   , 'Setup\CountriesController@destroy');
});
