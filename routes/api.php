<?php

use App\Http\Controllers\BrandAPIController;
use App\Http\Controllers\CarAPIController;
use App\Http\Controllers\EngineAPIController;
use App\Http\Controllers\API\CarController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\EngineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/cars',CarController::class);

Route::resource('/brands',BrandController::class);

Route::resource('/engines',EngineController::class);
