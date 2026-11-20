<?php

use Illuminate\Support\Facades\Route;

$namespace = "App\Laravel\Controllers\Backoffice";

Route::group([
    'as' => "backoffice.",
    'namespace' => $namespace,
    'prefix' => "admin",
    'middleware' => ["web"]
], function () {

    include_once app_path("Laravel/Routes/Backoffice/Auth.php");

    Route::group(['middleware' => "backoffice.auth"], function () {
        Route::get('/', ['as' => 'dashboard', 'uses' => 'MainController@index']);
        Route::get('home', ['as' => 'home', 'uses' => 'MainController@home']);;
        Route::get('about', ['as' => 'about', 'uses' => 'MainController@about']);;
        Route::get('contact', ['as' => 'contact', 'uses' => 'MainController@contact']);;

        Route::get('logout', ['as' => 'logout', 'uses' => 'AuthenticationController@logout']);;

        include_once app_path("Laravel/Routes/Backoffice/AccountManagement.php");
        include_once app_path("Laravel/Routes/Backoffice/ProfileManagement.php");
    });
});
