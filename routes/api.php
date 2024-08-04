<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/unauthorized', fn () => response()->json(['error' => 'Unauthorized'], 401))->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/user', [UserController::class, 'index']);
    Route::put('/user', [UserController::class, 'update']);
    Route::get('/user/favorites', [UserController::class, 'favorites']);
    Route::post('/user/favorite', [UserController::class, 'addFavorite']);
    Route::get('/user/appointment', [UserController::class, 'appointments']);

    Route::apiResource('/barber', BarberController::class);
    Route::get('/search', [BarberController::class, 'search']);
    Route::post('/barber/{id}/appointment', [BarberController::class, 'addAppointment']);
    Route::get('/barber/{id}/appointments', [BarberController::class, 'appointments']);
});
