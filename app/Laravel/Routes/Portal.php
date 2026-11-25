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
        Route::get('/', ['as' => 'home', 'uses' => 'CMS\HomeController@index']);

        include_once app_path("Laravel/Routes/Portal/ProfileManagement.php");
        include_once app_path("Laravel/Routes/Portal/CMS.php");

        Route::get('logout', ['as' => 'logout', 'uses' => 'AuthenticationController@logout']);;
    });
});
