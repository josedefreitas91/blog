<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
	$composer = str_replace('public', 'composer.json', getcwd());
	$composer = json_decode(file_get_contents($composer));
	// return response()->json([
	// 	'name' => $composer->name,
	// 	'description' => $composer->description,
	// ]);
    return response()->json($composer);
});
