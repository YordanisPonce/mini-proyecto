<?php

use App\Http\Middleware\AppMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->middleware(AppMiddleware::class)->group(function () {
    $basePath = "routes/api/v1";
    Route::group(
        [
            'prefix' => '/points'
        ],
        base_path("$basePath/points.php")
    );

    Route::group(
        [
            'prefix' => '/app'
        ],
        base_path("$basePath/app.php")
    );
});