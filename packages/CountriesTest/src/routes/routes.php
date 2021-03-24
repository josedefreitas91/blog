<?php

use CountriesTest\Http\Controllers\CountryController;
use CountriesTest\Http\Controllers\StateController;
use CountriesTest\Http\Controllers\CityController;

Route::group(['prefix' => 'countries'], function() {
    Route::get('/', CountryController::class.'@index');
    Route::get('/{id}', CountryController::class.'@show');
    Route::post('/', CountryController::class.'@store');
    Route::put('/{id}', CountryController::class.'@update');
    Route::delete('/{id}', CountryController::class.'@destroy');
});

Route::group(['prefix' => 'states'], function() {
    Route::get('/', StateController::class.'@index');
    Route::get('/{id}', StateController::class.'@show');
    Route::post('/', StateController::class.'@store');
    Route::put('/{id}', StateController::class.'@update');
    Route::delete('/{id}', StateController::class.'@destroy');
});

Route::group(['prefix' => 'cities'], function() {
    Route::get('/', CityController::class.'@index');
    Route::get('/{id}', CityController::class.'@show');
    Route::post('/', CityController::class.'@store');
    Route::put('/{id}', CityController::class.'@update');
    Route::delete('/{id}', CityController::class.'@destroy');
});