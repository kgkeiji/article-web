<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user-management', 'as' => 'user-management.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'UserManagementController@index']);

    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'UserManagementController@edit']);
    Route::post('edit/{id}', ['as' => 'update', 'uses' => 'UserManagementController@update']);

    Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'UserManagementController@delete']);

    Route::get('show/{id}', ['as' => 'show', 'uses' => 'UserManagementController@show']);
});
