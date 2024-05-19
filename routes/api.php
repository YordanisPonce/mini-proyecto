<?php

use App\Http\Middleware\AppMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware(AppMiddleware::class)->group(function () {
    Route::group(
        [
            'prefix' => '/points'
        ],
        base_path('routes/api/v1/points.php')
    );

    Route::group(
        [
            'prefix' => '/uuid'
        ],
        base_path('routes/api/v1/uuid.php')
    );
});