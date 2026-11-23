<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin-management', 'as' => 'admin-management.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'AdminManagementController@index']);

    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'AdminManagementController@edit']);
    Route::post('edit/{id}', ['as' => 'update', 'uses' => 'AdminManagementController@update']);

    Route::get('show/{id}', ['as' => 'show', 'uses' => 'AdminManagementController@show']);
});
