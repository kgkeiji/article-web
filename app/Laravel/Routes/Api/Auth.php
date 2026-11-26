<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => "auth", 'as' => 'auth.'], function () {
    Route::post('register', ['as' => 'register', 'uses' => 'AuthenticationController@register']);
    Route::post('login', ['as' => 'login', 'uses' => 'AuthenticationController@login']);
});

Route::group(['prefix' => "auth", 'as' => 'auth.', 'middleware' => 'api.auth'], function () {
    Route::post('logout', ['as' => 'logout', 'uses' => 'AuthenticationController@logout']);
    Route::post('refresh-token', ['as' => 'refresh_token', 'uses' => 'AuthenticationController@refresh_token']);
    Route::post('check-login', ['as' => 'check_login', 'uses' => 'AuthenticationController@check_login']);
});
