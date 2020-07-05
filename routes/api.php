<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'AuthController@login');

Route::group(['middleware' => ['api_auth'], 'prefix' => 'user'], function () {
    Route::get('{id}', 'UserController@get')->where('id', '[0-9]+');
    Route::delete('delete/{id}', 'UserController@delete')->where('id', '[0-9]+');
    Route::post('edit/{id}', 'UserController@onStore')->where('id', '[0-9]+');
    Route::post('create', 'UserController@onStore');
    Route::get('list', 'UserController@getList');

    Route::post('addToEvent/{id}', 'UserController@addToEvent')->where('id', '[0-9]+');
    Route::post('delFromEvent/{id}', 'UserController@delFromEvent')->where('id', '[0-9]+');
});
