<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'countries'], function() {
    Route::get('/', 'CountryController@index');
    Route::get('/{id}', 'CountryController@show');
    Route::post('/', 'CountryController@store');
    Route::put('/{id}', 'CountryController@update');
    Route::delete('/{id}', 'CountryController@destroy');
});

Route::group(['prefix' => 'states'], function() {
    Route::get('/', 'StateController@index');
    Route::get('/{id}', 'StateController@show');
    Route::post('/', 'StateController@store');
    Route::put('/{id}', 'StateController@update');
    Route::delete('/{id}', 'StateController@destroy');
});

Route::group(['prefix' => 'cities'], function() {
    Route::get('/', 'CityController@index');
    Route::get('/{id}', 'CityController@show');
    Route::post('/', 'CityController@store');
    Route::put('/{id}', 'CityController@update');
    Route::delete('/{id}', 'CityController@destroy');
});