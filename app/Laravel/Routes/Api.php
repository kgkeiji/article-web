<?php

use Illuminate\Support\Facades\Route;

$namespace = "App\Laravel\Controllers\Api";

Route::group([
    'as' => "api.",
    'namespace' => $namespace,
    'middleware' => ["api"]
], function () {
    Route::get('/', 'SettingController@health')->name('health');

    // auth
    include_once app_path("Laravel/Routes/Api/Auth.php");

    // profile
    Route::group(['middleware' => "api.auth"], function () {
        Route::group(['prefix' => "profile", 'as' => 'profile.'], function () {
            Route::post('info', ['as' => 'info', 'uses' => 'ProfileController@show']);
        });
        // article crud
        include_once app_path("Laravel/Routes/Api/Article.php");
    });
});
