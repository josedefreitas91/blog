<?php

use BaseExample\Http\Controllers\BaseController as Base;

Route::get('/countries/{country}', Base::class.'@countries');
Route::get('/countries', Base::class.'@countries');

#no me gusta usar esta opcion pero existe
Route::get('countries-test1', function() {
	return Core::countriesTest1();
});

Route::group(['prefix'=>'backoffice' ], function() {

	Route::get('/countries-test2', Base::class.'@countries');
});