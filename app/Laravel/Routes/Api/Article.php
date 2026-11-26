<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => "articles", 'as' => 'article.'], function () {
    Route::post('/', ['as => index', 'uses' => 'ArticleController@index']);
    Route::post('info/{id?}', ['as' => 'show', 'uses' => 'ArticleController@show']);
    Route::post('create', ['as' => 'store', 'uses' => 'ArticleController@store']);
    Route::post('edit/{id?}', ['as' => 'update', 'uses' => 'ArticleController@update']);
    Route::post('delete/{id?}', ['as' => 'destroy', 'uses' => 'ArticleController@destroy']);
});
