<?php

use Illuminate\Support\Facades\Route;

$namespace = "App\Laravel\Controllers\Portal";

Route::group([
    'as' => "portal.",
    'namespace' => $namespace,
    'prefix' => "user",
    'middleware' => ["web"]
], function () {

    include_once app_path("Laravel/Routes/Portal/Auth.php");

    Route::group(['middleware' => "portal.auth"], function () {
        Route::get('/', ['as' => 'home', 'uses' => 'MainController@index']);
        Route::get('about', ['as' => 'about', 'uses' => 'MainController@about']);;
        Route::get('contact', ['as' => 'contact', 'uses' => 'MainController@contact']);;

        Route::get('logout', ['as' => 'logout', 'uses' => 'AuthenticationController@logout']);;
    });
});
