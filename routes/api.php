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
  Route::get('institutions'         ,'Setup\InstitutionsController@index');
  Route::post('institutions'        ,'Setup\InstitutionsController@create');
  Route::put('institutions/{id}'    ,'Setup\InstitutionsController@update');
  Route::delete('institutions/{id}' ,'Setup\InstitutionsController@delete');
});
