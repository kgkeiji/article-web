<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'ProfileController@index']);

    Route::get('edit', ['as' => 'edit', 'uses' => 'ProfileController@edit']);
    Route::post('edit', ['as' => 'update', 'uses' => 'ProfileController@update']);
});
