<?php

/*
|--------------------------------------------------------------------------
| GFS Code Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"]              , function(){
    Route::get('gfs-categories'              , 'Setup\GfsCategoriesController@index');
    Route::post('gfs-categories'             , 'Setup\GfsCategoriesController@create');
    Route::get('gfs-categories/{id}'         , 'Setup\GfsCategoriesController@show');
    Route::get('gfs-categories/{id}/edit'    , 'Setup\GfsCategoriesController@edit');
    Route::put('gfs-categories/{id}'         , 'Setup\GfsCategoriesController@update');
    Route::delete('gfs-categories/{id}'      , 'Setup\GfsCategoriesController@destroy');

    Route::get('gfs-account-types'           , 'Setup\GfsAccountTypesController@index');
    Route::post('gfs-account-types'          , 'Setup\GfsAccountTypesController@create');
    Route::get('gfs-account-types/{id}'      , 'Setup\GfsAccountTypesController@show');
    Route::get('gfs-account-types/{id}/edit' , 'Setup\GfsAccountTypesController@edit');
    Route::put('gfs-account-types/{id}'      , 'Setup\GfsAccountTypesController@update');
    Route::delete('gfs-account-types/{id}'   , 'Setup\GfsAccountTypesController@destroy');

    Route::get('gfs-codes'                   , 'Setup\GfsCodessController@index');
    Route::post('gfs-codes'                  , 'Setup\GfsCodessController@create');
    Route::get('gfs-codes/{id}'              , 'Setup\GfsCodessController@show');
    Route::get('gfs-codes/{id}/edit'         , 'Setup\GfsCodessController@edit');
    Route::put('gfs-codes/{id}'              , 'Setup\GfsCodessController@update');
    Route::delete('gfs-codes/{id}'           , 'Setup\GfsCodessController@destory');
});
