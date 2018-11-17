<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TaxiController@show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/taxi/create','TaxiController@create');
    Route::post('/taxi/create','TaxiController@store');
    Route::post('/taxi/assing/{id}','TaxiController@assing');
    Route::post('/taxi/deassing/{id}','TaxiController@deassing');
});
