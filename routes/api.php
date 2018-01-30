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

    Route::resource('gfs-categories'    , 'Setup\GfsCategoriesController');
    Route::resource('gfs-account-types' , 'Setup\GfsAccountTypesController');
    Route::resource('gfs-codes'         , 'Setup\GfsCodesController');

    Route::get('loation-hierarchies'           , 'Setup\LocationHierarchiesController@index');
    Route::post('loation-hierarchies'          , 'Setup\LocationHierarchiesController@create');
    Route::get('loation-hierarchies/{id}'      , 'Setup\LocationHierarchiesController@show');
    Route::put('loation-hierarchies/{id}'      , 'Setup\LocationHierarchiesController@update');
    Route::delete('loation-hierarchies/{id}'   , 'Setup\LocationHierarchiesController@destroy');

    Route::get('loations'           , 'Setup\LocationsController@index');
    Route::post('loations'          , 'Setup\LocationsController@create');
    Route::get('loations/{id}'      , 'Setup\LocationsController@show');
    Route::put('loations/{id}'      , 'Setup\LocationsController@update');
    Route::delete('loations/{id}'   , 'Setup\LocationsController@destroy');

    Route::get('attraction-siteCategories'           , 'Setup\AttractionSiteCategoriesController@index');
    Route::post('attraction-siteCategories'          , 'Setup\AttractionSiteCategoriesController@create');
    Route::get('attraction-siteCategories/{id}'      , 'Setup\AttractionSiteCategoriesController@show');
    Route::get('attraction-siteCategories/{id}/edit' , 'Setup\AttractionSiteCategoriesController@edit');
    Route::put('attraction-siteCategories/{id}'      , 'Setup\AttractionSiteCategoriesController@update');
    Route::delete('attraction-siteCategories/{id}'   , 'Setup\AttractionSiteCategoriesController@destroy');

    Route::get('attraction-site-grades'           , 'Setup\AttractionSiteGradesController@index');
    Route::post('attractionsite-grades'           , 'Setup\AttractionSiteGradesController@create');
    Route::get('attraction-site-grades/{id}'      , 'Setup\AttractionSiteGradesController@show');
    Route::get('attraction-site-grades/{id}/edit' , 'Setup\AttractionSiteGradesController@edit');
    Route::put('attraction-site-grades/{id}'      , 'Setup\AttractionSiteGradesController@update');
    Route::delete('attraction-site-grades/{id}'   , 'Setup\AttractionSiteGradesController@destroy');

    Route::get('attraction-sites'           , 'Setup\AttractionSitesController@index');
    Route::post('attraction-sites'          , 'Setup\AttractionSitesController@create');
    Route::get('attraction-sites/{id}'      , 'Setup\AttractionSitesController@show');
    Route::get('attraction-sites/{id}/edit' , 'Setup\AttractionSitesController@edit');
    Route::put('attraction-sites/{id}'      , 'Setup\AttractionSitesController@update');
    Route::delete('attraction-sites/{id}'   , 'Setup\AttractionSitesController@destroy');

    Route::get('meteorological-details'           , 'Setup\MeteorologicalDetailsController@index');
    Route::post('meteorological-details'          , 'Setup\MeteorologicalDetailsController@create');
    Route::get('meteorological-details/{id}'      , 'Setup\MeteorologicalDetailsController@show');
    Route::get('meteorological-details/{id}/edit' , 'Setup\MeteorologicalDetailsController@edit');
    Route::put('meteorological-details/{id}'      , 'Setup\MeteorologicalDetailsController@update');
    Route::delete('meteorological-details/{id}'   , 'Setup\MeteorologicalDetailsController@destroy');
});
