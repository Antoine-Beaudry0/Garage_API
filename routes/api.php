<?php

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

// Routes for Notifications
Route::prefix('notifications')->group(function () {
    Route::get('/', [NotificationsController::class, 'index']);
    Route::post('/', [NotificationsController::class, 'store']);
    Route::get('/{id}', [NotificationsController::class, 'show']);
    Route::put('/{id}', [NotificationsController::class, 'update']);
    Route::delete('/{id}', [NotificationsController::class, 'destroy']);
});

// Routes for RendezVous
Route::prefix('rendezvous')->group(function () {
    Route::get('/', [RendezVousController::class, 'index']);
    Route::post('/', [RendezVousController::class, 'store']);
    Route::get('/{id}', [RendezVousController::class, 'show']);
    Route::put('/{id}', [RendezVousController::class, 'update']);
    Route::delete('/{id}', [RendezVousController::class, 'destroy']);
});

// Routes for Services
Route::prefix('services')->group(function () {
    Route::get('/', [ServicesController::class, 'index']);
    Route::post('/', [ServicesController::class, 'store']);
    Route::get('/{id}', [ServicesController::class, 'show']);
    Route::put('/{id}', [ServicesController::class, 'update']);
    Route::delete('/{id}', [ServicesController::class, 'destroy']);
});

// Routes for Users
Route::prefix('users')->group(function () {
    Route::get('/', [UsersController::class, 'index']);
    Route::post('/', [UsersController::class, 'store']);
    Route::get('/{id}', [UsersController::class, 'show']);
    Route::put('/{id}', [UsersController::class, 'update']);
    Route::delete('/{id}', [UsersController::class, 'destroy']);
});

// Routes for Voitures
Route::prefix('voitures')->group(function () {
    Route::get('/', [VoituresController::class, 'index']);
    Route::post('/', [VoituresController::class, 'store']);
    Route::get('/{id}', [VoituresController::class, 'show']);
    Route::put('/{id}', [VoituresController::class, 'update']);
    Route::delete('/{id}', [VoituresController::class, 'destroy']);
});
