<?php
/*
|--------------------------------------------------------------------------
| Attraction Site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"]                       , function(){
    Route::get('attraction-site-categories'           , 'Setup\AttractionSiteCategoriesController@index');
    Route::post('attraction-site-categories'          , 'Setup\AttractionSiteCategoriesController@create');
    Route::get('attraction-site-categories/{id}'      , 'Setup\AttractionSiteCategoriesController@show');
    Route::get('attraction-site-categories/{id}/edit' , 'Setup\AttractionSiteCategoriesController@edit');
    Route::put('attraction-site-categories/{id}'      , 'Setup\AttractionSiteCategoriesController@update');
    Route::delete('attraction-site-categories/{id}'   , 'Setup\AttractionSiteCategoriesController@destroy');

    Route::get('attraction-site-grades'               , 'Setup\AttractionSiteGradesController@index');
    Route::post('attraction-site-grades'               , 'Setup\AttractionSiteGradesController@create');
    Route::get('attraction-site-grades/{id}'          , 'Setup\AttractionSiteGradesController@show');
    Route::get('attraction-site-grades/{id}/edit'     , 'Setup\AttractionSiteGradesController@edit');
    Route::put('attraction-site-grades/{id}'          , 'Setup\AttractionSiteGradesController@update');
    Route::delete('attraction-site-grades/{id}'       , 'Setup\AttractionSiteGradesController@destroy');

    Route::get('attraction-sites'                     , 'Setup\AttractionSitesController@index');
    Route::post('attraction-sites'                    , 'Setup\AttractionSitesController@create');
    Route::get('attraction-sites/{id}'                , 'Setup\AttractionSitesController@show');
    Route::get('attraction-sites/{id}/edit'           , 'Setup\AttractionSitesController@edit');
    Route::put('attraction-sites/{id}'                , 'Setup\AttractionSitesController@update');
    Route::delete('attraction-sites/{id}'             , 'Setup\AttractionSitesController@destroy');
});
