<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\RoutingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('throttle:30,1')->group(function () {
    Route::get('/location', [LocationController::class, 'index']);
    Route::post('/location/store', [LocationController::class, 'store']);
    Route::get('/location/{id}', [LocationController::class, 'show']);
    Route::post('/location/update', [LocationController::class, 'update']);
    Route::delete('/location/{location}', [LocationController::class, 'delete']);
});


Route::get('/routing/{latitude}/{longitude}', [RoutingController::class, 'index']);
