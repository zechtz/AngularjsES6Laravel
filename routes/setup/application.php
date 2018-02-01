<?php
Route::group(["prefix" => "v1"]              , function(){
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

    Route::get('application-forms'   , 'Setup\ApplicationFormsController@index');
    Route::post('application-forms'  , 'Setup\ApplicationFormsController@create');
    Route::get('application-forms/{id}'      , 'Setup\ApplicationFormsController@show');
    Route::put('application-forms/{id}'      , 'Setup\ApplicationFormsController@update');
    Route::delete('application-forms/{id}'   , 'Setup\ApplicationFormsController@destroy');

    Route::get('application-form-fields'   , 'Setup\ApplicationFormFieldsController@index');
    Route::post('application-form-fields'  , 'Setup\ApplicationFormFieldsController@create');
    Route::get('application-form-fields/{id}'      , 'Setup\ApplicationFormFieldsController@show');
    Route::put('application-form-fields/{id}'      , 'Setup\ApplicationFormFieldsController@update');
    Route::delete('application-form-fields/{id}'   , 'Setup\ApplicationFormFieldsController@destroy');
});
