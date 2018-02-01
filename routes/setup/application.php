<?php
/*
|--------------------------------------------------------------------------
| Appliction Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"]            , function(){
    Route::get('application-types'         , 'Setup\ApplicationTypesController@index');
    Route::post('application-types'        , 'Setup\ApplicationTypesController@create');
    Route::get('application-types/{id}'    , 'Setup\ApplicationTypesController@show');
    Route::put('application-types/{id}'    , 'Setup\ApplicationTypesController@update');

    Route::delete('application-types/{id}' , 'Setup\ApplicationTypesController@destroy');
    Route::get('application-forms'         , 'Setup\ApplicationFormsController@index');
    Route::post('application-forms'        , 'Setup\ApplicationFormsController@create');
    Route::get('application-forms/{id}'    , 'Setup\ApplicationFormsController@show');
    Route::put('application-forms/{id}'    , 'Setup\ApplicationFormsController@update');
    Route::delete('application-forms/{id}' , 'Setup\ApplicationFormsController@destroy');

    Route::get('application-forms'         , 'Setup\ApplicationFormsController@index');
    Route::post('application-forms'        , 'Setup\ApplicationFormsController@create');
    Route::get('application-forms/{id}'    , 'Setup\ApplicationFormsController@show');
    Route::put('application-forms/{id}'    , 'Setup\ApplicationFormsController@update');
    Route::delete('application-forms/{id}' , 'Setup\ApplicationFormsController@destroy');
});
