<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'account-management', 'as' => 'account-management.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'AccountManagementController@index']);
    Route::get('index-portal', ['as' => 'index-portal', 'uses' => 'AccountManagementController@index_portal']);

    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'AccountManagementController@edit']);
    Route::post('edit/{id}', ['as' => 'update', 'uses' => 'AccountManagementController@update']);

    Route::get('edit-portal/{id}', ['as' => 'edit-portal', 'uses' => 'AccountManagementController@edit_portal']);
    Route::post('edit-portal/{id}', ['as' => 'update-portal', 'uses' => 'AccountManagementController@update_portal']);

    Route::get('show/{id}', ['as' => 'show', 'uses' => 'AccountManagementController@show']);
    Route::get('show-portal/{id}', ['as' => 'show-portal', 'uses' => 'AccountManagementController@show_portal']);
});
