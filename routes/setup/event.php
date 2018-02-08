<?php

/*
|--------------------------------------------------------------------------
| Event Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::group(["prefix" => "v1"]            , function(){
    Route::get('events'                    , 'Setup\EventController@index');
    Route::post('events'                   , 'Setup\EventController@create');
    Route::get('events/{id}'               , 'Setup\EventController@show');
    Route::get('events/{id}/edit'          , 'Setup\EventController@edit');
    Route::put('events/{id}'               , 'Setup\EventController@update');
    Route::delete('events/{id}'            , 'Setup\EventController@destroy');

    Route::get('calendar-events'           , 'Setup\CalendarEventController@index');
    Route::post('calendar-events'          , 'Setup\CalendarEventController@create');
    Route::get('calendar-events/{id}'      , 'Setup\CalendarEventController@show');
    Route::get('calendar-events/{id}/edit' , 'Setup\CalendarEventController@edit');
    Route::put('calendar-events/{id}'      , 'Setup\CalendarEventController@update');
    Route::delete('calendar-events/{id}'   , 'Setup\CalendarEventController@destroy');
});
