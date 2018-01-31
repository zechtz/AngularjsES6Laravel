<?php

Route::group(["prefix" => "v1"] , function(){
    Route::get('plots'          , 'Setup\PlotsController@index');
    Route::post('plots'         , 'Setup\PlotsController@create');
    Route::get('plots/{id}'     , 'Setup\PlotsController@show');
    Route::put('plots/{id}'     , 'Setup\PlotsController@update');
    Route::delete('plots/{id}'  , 'Setup\PlotsController@destroy');
});
