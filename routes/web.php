<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'event'], function () {
   Route::get('{id}', 'EventController@get')->where('id', '[0-9]+');
   Route::get('list', 'EventController@getList');
});
