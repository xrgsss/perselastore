<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JerseyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// AUTH
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// PROTECTED (JWT)
Route::middleware('jwt.auth')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/jerseys', [JerseyController::class, 'store']);
    Route::put('/jerseys/{id}', [JerseyController::class, 'update']);
    Route::delete('/jerseys/{id}', [JerseyController::class, 'destroy']);
});

// PUBLIC
Route::get('/jerseys', [JerseyController::class, 'index']);
Route::get('/jerseys/{id}', [JerseyController::class, 'show']);
