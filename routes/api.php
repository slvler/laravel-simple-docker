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
Route::post('/login',[\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:api'], function ($router) {

    Route::post('/register',[\App\Http\Controllers\Auth\RegisterController::class, 'store']);
    Route::post('/logout',[\App\Http\Controllers\Auth\LogoutController::class, 'logout']);
    Route::post('/refresh',[\App\Http\Controllers\Auth\LoginController::class, 'refresh']);

    Route::get('/location', [LocationController::class, 'index'])->middleware('throttle:30,1');
    Route::post('/location/store', [LocationController::class, 'store'])->middleware('throttle:30,1');
    Route::get('/location/{id}', [LocationController::class, 'show'])->middleware('throttle:30,1');
    Route::post('/location/update', [LocationController::class, 'update'])->middleware('throttle:30,1');
    Route::delete('/location/{location}', [LocationController::class, 'delete'])->middleware('throttle:30,1');

    Route::get('/routing/{latitude}/{longitude}', [RoutingController::class, 'index'])->middleware('throttle:30,1');
});
