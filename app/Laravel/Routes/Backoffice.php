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

        include_once app_path("Laravel/Routes/Backoffice/AdminManagement.php");
        include_once app_path("Laravel/Routes/Backoffice/UserManagement.php");
        include_once app_path("Laravel/Routes/Backoffice/ProfileManagement.php");

        Route::get('logout', ['as' => 'logout', 'uses' => 'AuthenticationController@logout']);;
    });
});
