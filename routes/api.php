<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signin', 'Api\AuthController@signin');
Route::post('signup', 'Api\AuthController@signup');

Route::group(['middleware' => 'auth:api'], function () {
    
});