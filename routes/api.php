<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'AuthController@login');

Route::group(['middleware' => ['api_auth'], 'prefix' => 'user'], function () {
    Route::get('{id}', 'UserController@get')->where('id', '[0-9]+');
    Route::delete('delete/{id}', 'UserController@delete')->where('id', '[0-9]+');
    Route::post('create', 'UserController@delete');
});
