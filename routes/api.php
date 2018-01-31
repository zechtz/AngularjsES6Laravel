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

    Route::get('country-groups'           , 'Setup\CountryGroupsController@index');
    Route::post('country-groups'          , 'Setup\CountryGroupsController@create');
    Route::get('country-groups/{id}'      , 'Setup\CountryGroupsController@show');
    Route::get('country-groups/{id}/edit' , 'Setup\CountryGroupsController@edit');
    Route::put('country-groups/{id}'      , 'Setup\CountryGroupsController@update');
    Route::delete('country-groups/{id}'   , 'Setup\CountryGroupsController@destroy');

    Route::get('countries'           , 'Setup\CountriesController@index');
    Route::post('countries'          , 'Setup\CountriesController@create');
    Route::get('countries/{id}'      , 'Setup\CountriesController@show');
    Route::get('countries/{id}/edit' , 'Setup\CountriesController@edit');
    Route::put('countries/{id}'      , 'Setup\CountriesController@update');
    Route::delete('countries/{id}'   , 'Setup\CountriesController@destroy');

    Route::get('financial-years'           , 'Setup\FinancialYearController@index');
    Route::post('financial-years'          , 'Setup\FinancialYearController@create');
    Route::get('financial-years/{id}'      , 'Setup\FinancialYearController@show');
    Route::get('financial-years/{id}/edit' , 'Setup\FinancialYearController@edit');
    Route::put('financial-years/{id}'      , 'Setup\FinancialYearController@update');
    Route::delete('financial-years/{id}'   , 'Setup\FinancialYearController@destroy');

    Route::get('events'           , 'Setup\EventController@index');
    Route::post('events'          , 'Setup\EventController@create');
    Route::get('events/{id}'      , 'Setup\EventController@show');
    Route::get('events/{id}/edit' , 'Setup\EventController@edit');
    Route::put('events/{id}'      , 'Setup\EventController@update');
    Route::delete('events/{id}'   , 'Setup\EventController@destroy');

    Route::get('calendar-events'           , 'Setup\CalendarEventController@index');
    Route::post('calendar-events'          , 'Setup\CalendarEventController@create');
    Route::get('calendar-events/{id}'      , 'Setup\CalendarEventController@show');
    Route::get('calendar-events/{id}/edit' , 'Setup\CalendarEventController@edit');
    Route::put('calendar-events/{id}'      , 'Setup\CalendarEventController@update');
    Route::delete('calendar-events/{id}'   , 'Setup\CalendarEventController@destroy');

    Route::get('expirations'           , 'Setup\ExpirationController@index');
    Route::post('expirations'          , 'Setup\ExpirationController@create');
    Route::get('expirations/{id}'      , 'Setup\ExpirationController@show');
    Route::get('expirations/{id}/edit' , 'Setup\ExpirationController@edit');
    Route::put('expirations/{id}'      , 'Setup\ExpirationController@update');
    Route::delete('expirations/{id}'   , 'Setup\ExpirationController@destroy');


});
