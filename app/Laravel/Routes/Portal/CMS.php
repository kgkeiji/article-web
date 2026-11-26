<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cms', 'as' => 'cms.'], function () {
    Route::get('home', ['as' => 'home', 'uses' => 'CMS\HomeController@index']);
    Route::post('home', ['as' => 'store', 'uses' => 'CMS\HomeController@store']);

    Route::get('about', ['as' => 'about', 'uses' => 'CMS\AboutController@index']);
    Route::post('about', ['as' => 'about.store', 'uses' => 'CMS\AboutController@store']);

    Route::get('contact', ['as' => 'contact', 'uses' => 'CMS\ContactController@index']);;

    Route::get('article', ['as' => 'article', 'uses' => 'CMS\ArticleController@index']);;
});
