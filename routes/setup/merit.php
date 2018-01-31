<?php
Route::group(["prefix" => "v1"]              , function(){
Route::get('merits'   , 'Setup\MeritsController@index');
Route::post('merits'  , 'Setup\MeritsController@create');
Route::get('merits/{id}'      , 'Setup\MeritsController@show');
Route::put('merits/{id}'      , 'Setup\MeritsController@update');
Route::delete('merits/{id}'   , 'Setup\MeritsController@destroy');
});
