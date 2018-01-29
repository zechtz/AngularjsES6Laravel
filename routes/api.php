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
    Route::get('attractionSiteCategories'           , 'Setup\attractionSiteCategoriesController@index');
    Route::post('attractionSiteCategories'          , 'Setup\attractionSiteCategoriesController@create');
    Route::get('attractionSiteCategories/{id}'      , 'Setup\attractionSiteCategoriesController@show');
    Route::get('attractionSiteCategories/{id}/edit' , 'Setup\attractionSiteCategoriesController@edit');
    Route::put('attractionSiteCategories/{id}'      , 'Setup\attractionSiteCategoriesController@update');
    Route::delete('attractionSiteCategories/{id}'   , 'Setup\attractionSiteCategoriesController@destroy');
});

Route::group(["prefix" => "v1"], function(){
    Route::get('attractionSiteGrades'           , 'Setup\attractionSiteGradesController@index');
    Route::post('attractionSiteGrades'          , 'Setup\attractionSiteGradesController@create');
    Route::get('attractionSiteGrades/{id}'      , 'Setup\attractionSiteGradesController@show');
    Route::get('attractionSiteGrades/{id}/edit' , 'Setup\attractionSiteGradesController@edit');
    Route::put('attractionSiteGrades/{id}'      , 'Setup\attractionSiteGradesController@update');
    Route::delete('attractionSiteGrades/{id}'   , 'Setup\attractionSiteGradesController@destroy');
});

Route::group(["prefix" => "v1"], function(){
    Route::get('attractionSites'           , 'Setup\attractionSitesController@index');
    Route::post('attractionSites'          , 'Setup\attractionSitesController@create');
    Route::get('attractionSites/{id}'      , 'Setup\attractionSitesController@show');
    Route::get('attractionSites/{id}/edit' , 'Setup\attractionSitesController@edit');
    Route::put('attractionSites/{id}'      , 'Setup\attractionSitesController@update');
    Route::delete('attractionSites/{id}'   , 'Setup\attractionSitesController@destroy');
});

Route::group(["prefix" => "v1"], function(){
    Route::get('meteorologicalDetails'     , 'Setup\meteorologicalDetailsController@index');
    Route::post('meteorologicalDetails'          , 'Setup\meteorologicalDetailsController@create');
    Route::get('meteorologicalDetails/{id}'      , 'Setup\meteorologicalDetailsController@show');
    Route::get('meteorologicalDetails/{id}/edit' , 'Setup\meteorologicalDetailsController@edit');
    Route::put('meteorologicalDetails/{id}'      , 'Setup\meteorologicalDetailsController@update');
    Route::delete('meteorologicalDetails/{id}'   , 'Setup\meteorologicalDetailsController@destroy');
});
