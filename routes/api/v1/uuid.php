<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PointController;
use App\Http\Middleware\AppMiddleware;
use Illuminate\Support\Facades\Route;


Route::post('/', [AppController::class, 'store'])->withoutMiddleware([AppMiddleware::class]);
;
