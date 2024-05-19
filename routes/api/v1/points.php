<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PointController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PointController::class, 'index']);

