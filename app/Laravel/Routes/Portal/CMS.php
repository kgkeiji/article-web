<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
    Route::get('home', ['as' => 'home', 'uses' => 'CMS\HomeController@index']);
    Route::post('home', ['as' => 'store', 'uses' => 'CMS\HomeController@store']);

    Route::get('about', ['as' => 'about', 'uses' => 'CMS\AboutController@index']);
    Route::post('about', ['as' => 'about.store', 'uses' => 'CMS\AboutController@store']);

    Route::get('contact', ['as' => 'contact', 'uses' => 'CMS\ContactController@index']);;
    Route::post('contact', ['as' => 'contact.store', 'uses' => 'CMS\ContactController@store']);

    Route::get('articles', ['as' => 'articles', 'uses' => 'CMS\ArticlesController@index']);
    Route::post('articles', ['as' => 'articles.store', 'uses' => 'CMS\ArticlesController@store']);
    Route::post('articles/{id}/update', ['as' => 'articles.update', 'uses' => 'CMS\ArticlesController@update']);
    Route::post('articles/{id}/delete', ['as' => 'articles.delete', 'uses' => 'CMS\ArticlesController@delete']);
});
