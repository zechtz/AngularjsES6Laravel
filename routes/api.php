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

    Route::get('currencies'           , 'Setup\CurrenciesController@index');
    Route::post('currencies'          , 'Setup\CurrenciesController@create');
    Route::get('currencies/{id}'      , 'Setup\CurrenciesController@show');
    Route::get('currencies/{id}/edit' , 'Setup\CurrenciesController@edit');
    Route::put('currencies/{id}'      , 'Setup\CurrenciesController@update');
    Route::delete('currencies/{id}'   , 'Setup\CurrenciesController@destroy');

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

    Route::get('attraction-site-categories'           , 'Setup\AttractionSiteCategoriesController@index');
    Route::post('attraction-site-categories'          , 'Setup\AttractionSiteCategoriesController@create');
    Route::get('attraction-site-categories/{id}'      , 'Setup\AttractionSiteCategoriesController@show');
    Route::get('attraction-site-categories/{id}/edit' , 'Setup\AttractionSiteCategoriesController@edit');
    Route::put('attraction-site-categories/{id}'      , 'Setup\AttractionSiteCategoriesController@update');
    Route::delete('attraction-site-categories/{id}'   , 'Setup\AttractionSiteCategoriesController@destroy');

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

    Route::resource('country-groups'           , 'Setup\CountryGroupsController');
    Route::resource('countries'           , 'Setup\CountriesController');

    Route::resource('accommodation-facility-types'       , 'Setup\AccommodationFacilityTypesController');
    Route::resource('accommodation-facilities'       , 'Setup\AccommodationFacilitiesController');

    Route::get('countries'           , 'Setup\CountriesController@index');
    Route::post('countries'          , 'Setup\CountriesController@create');
    Route::get('countries/{id}'      , 'Setup\CountriesController@show');
    Route::get('countries/{id}/edit' , 'Setup\CountriesController@edit');
    Route::put('countries/{id}'      , 'Setup\CountriesController@update');
    Route::delete('countries/{id}'   , 'Setup\CountriesController@destroy');

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

    Route::get('trophies'           , 'Setup\TrophiesController@index');
    Route::post('trophies'          , 'Setup\TrophiesController@create');
    Route::get('trophies/{id}'      , 'Setup\TrophiesController@show');
    Route::get('trophies/{id}/edit' , 'Setup\TrophiesController@edit');
    Route::put('trophies/{id}'      , 'Setup\TrophiesController@update');
    Route::delete('trophies/{id}'   , 'Setup\TrophiesController@destroy');

    Route::get('specimen-types'           , 'Setup\SpecimenTypesController@index');
    Route::post('specimen-types'          , 'Setup\SpecimenTypesController@create');
    Route::get('specimen-types/{id}'      , 'Setup\SpecimenTypesController@show');
    Route::get('specimen-types/{id}/edit' , 'Setup\SpecimenTypesController@edit');
    Route::put('specimen-types/{id}'      , 'Setup\SpecimenTypesController@update');
    Route::delete('specimen-types/{id}'   , 'Setup\SpecimenTypesController@destroy');
});
