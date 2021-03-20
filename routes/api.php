<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

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