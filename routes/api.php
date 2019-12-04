<?php

use Illuminate\Http\Request;

Route::post('signin', 'Api\AuthController@signin');
Route::post('signup', 'Api\AuthController@signup');

Route::get('refrigerant/total', 'Api\RefrigerantController@totalRefrigerant');

Route::resource('refrigerant', 'Api\RefrigerantController');
Route::resource('type', 'Api\TypeController');
Route::resource('liter', 'Api\LiterController');
Route::resource('flavor', 'Api\FlavorController');