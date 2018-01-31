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

require_once("setup/accommodation.php");
require_once("setup/attraction_site.php");
require_once("setup/country.php");
require_once("setup/currency.php");
require_once("setup/event.php");
require_once("setup/expiration.php");
require_once("setup/financial_year.php");
require_once("setup/gfs.php");
require_once("setup/institution.php");
require_once("setup/location.php");
require_once("setup/meteorological_detail.php");
require_once("setup/reserve.php");
require_once("setup/species.php");
require_once("setup/specimen.php");
require_once("setup/station.php");
require_once("setup/tarrif.php");
require_once("setup/unit.php");


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

    Route::get('reserve-hierarchies'   , 'Setup\ReserveHierarchiesController@index');
    Route::post('reserve-hierarchies'  , 'Setup\ReserveHierarchiesController@create');
    Route::get('reserve-hierarchies/{id}'      , 'Setup\ReserveHierarchiesController@show');
    Route::put('reserve-hierarchies/{id}'      , 'Setup\ReserveHierarchiesController@update');
    Route::delete('reserve-hierarchies/{id}'   , 'Setup\ReserveHierarchiesController@destroy');

    Route::get('reserve-distributions'   , 'Setup\ReserveDistributionsController@index');
    Route::post('reserve-distributions'  , 'Setup\ReserveDistributionsController@create');
    Route::get('reserve-distributions/{id}'      , 'Setup\ReserveDistributionsController@show');
    Route::put('reserve-distributions/{id}'      , 'Setup\ReserveDistributionsController@update');
    Route::delete('reserve-distributions/{id}'   , 'Setup\ReserveDistributionsController@destroy');

    Route::get('merits'   , 'Setup\MeritsController@index');
    Route::post('merits'  , 'Setup\MeritsController@create');
    Route::get('merits/{id}'      , 'Setup\MeritsController@show');
    Route::put('merits/{id}'      , 'Setup\MeritsController@update');
    Route::delete('merits/{id}'   , 'Setup\MeritsController@destroy');

    Route::get('application-types'   , 'Setup\ApplicationTypesController@index');
    Route::post('application-types'  , 'Setup\ApplicationTypesController@create');
    Route::get('application-types/{id}'      , 'Setup\ApplicationTypesController@show');
    Route::put('application-types/{id}'      , 'Setup\ApplicationTypesController@update');
    Route::delete('application-types/{id}'   , 'Setup\ApplicationTypesController@destroy');

    Route::get('application-forms'   , 'Setup\ApplicationFormsController@index');
    Route::post('application-forms'  , 'Setup\ApplicationFormsController@create');
    Route::get('application-forms/{id}'      , 'Setup\ApplicationFormsController@show');
    Route::put('application-forms/{id}'      , 'Setup\ApplicationFormsController@update');
    Route::delete('application-forms/{id}'   , 'Setup\ApplicationFormsController@destroy');

});
