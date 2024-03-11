<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VoituresController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PageGaragesController;
use App\Http\Controllers\EmplacementsController;
use App\Http\Controllers\ServiceRendezVousController;
use App\Http\Controllers\StatutsController;

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


//CONNEXION

Route::POST('/login',[UsersController::class,'login']);

// Routes for Notifications
Route::prefix('notifications')->group(function () {
    Route::get('/', [NotificationsController::class, 'index']);
    Route::post('/', [NotificationsController::class, 'store']);
    Route::get('/{id}', [NotificationsController::class, 'show']);
    Route::put('/{id}', [NotificationsController::class, 'update']);
    Route::delete('/{id}', [NotificationsController::class, 'destroy']);
    Route::post('/notifications/send/{notification}', [NotificationsController::class, 'sendEmail']);
});

// Routes for RendezVous
Route::prefix('rendezvous')->group(function () {
    Route::get('/', [RendezVousController::class, 'index']);
    Route::post('/', [RendezVousController::class, 'store']);
    Route::get('/encours', [RendezVousController::class, 'getRdvEnCours']);
    Route::get('/confirme', [RendezVousController::class, 'getRdvConfirme']);
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
    Route::post('/login',[ClientsController::class, 'login']);
 
});


// Routes for Voitures
Route::prefix('voitures')->group(function () {
    Route::get('/', [VoituresController::class, 'index']);
    Route::post('/', [VoituresController::class, 'store']);
    Route::get('/{id}', [VoituresController::class, 'show']);
    Route::put('/{id}', [VoituresController::class, 'update']);
    Route::delete('/{id}', [VoituresController::class, 'destroy']);
});
Route::prefix('pageGarages')->group(function () {
    Route::get('/', [PageGaragesController::class, 'index']);
    Route::post('/', [PageGaragesController::class, 'store']);
    Route::get('/{pageGarage}', [PageGaragesController::class, 'show']);
    Route::put('/{pageGarage}', [PageGaragesController::class, 'update']);
    Route::delete('/{pageGarage}', [PageGaragesController::class, 'destroy']);
});
Route::prefix('emplacements')->group(function () {
    Route::get('/', [EmplacementsController::class, 'index']);
    Route::post('/', [EmplacementsController::class, 'store']);
    Route::get('/{emplacement}', [EmplacementsController::class, 'show']);
    Route::put('/{emplacement}', [EmplacementsController::class, 'update']);
    Route::delete('/{emplacement}', [EmplacementsController::class, 'destroy']);
});
Route::prefix('serviceRendezVous')->group(function () {
    Route::get('/', [ServiceRendezVousController::class, 'index']);
    Route::post('/', [ServiceRendezVousController::class, 'store']);
    Route::get('/{serviceRendezVous}', [ServiceRendezVousController::class, 'show']);
    Route::put('/{serviceRendezVous}', [ServiceRendezVousController::class, 'update']);
    Route::delete('/{serviceRendezVous}', [ServiceRendezVousController::class, 'destroy']);
});
Route::prefix('statuts')->group(function () {
    Route::get('/', [StatutsController::class, 'index']);
    Route::post('/', [StatutsController::class, 'store']);
    Route::get('/{statut}', [StatutsController::class, 'show']);
    Route::put('/{statut}', [StatutsController::class, 'update']);
    Route::delete('/{statut}', [StatutsController::class, 'destroy']);
});
