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
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\GaragistesController;



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
Route::POST('/loginuser',[ClientsController::class,'login']);
Route::POST('/logingarage',[GaragistesController::class,'login']);
Route::post('/logout', [GaragistesController::class, 'logout']);
Route::middleware('auth:client')->get('/rendezvous/client', [RendezVousController::class, 'getRdvClient']);


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
        Route::get('/nonconfirme', [RendezVousController::class, 'getRdvNonConfirme']);
        Route::get('/{id}', [RendezVousController::class, 'show']);
        Route::put('/{id}', [RendezVousController::class, 'update']);
        Route::delete('/{id}', [RendezVousController::class, 'destroy']);
        Route::get('/confirmer', [RendezVousController::class, 'confirmerRendezVous']);
        Route::patch('/confirmer/{id}', [RendezVousController::class, 'confirmerRendezVous']);
        Route::patch('/terminer/{id}', [RendezVousController::class, 'terminerRendezVous']);
});

// Routes for Services
Route::prefix('services')->group(function () {
    Route::get('/', [ServicesController::class, 'index']);
    Route::post('/', [ServicesController::class, 'store']);
    Route::get('/{id}', [ServicesController::class, 'show']);
    Route::put('/{id}', [ServicesController::class, 'update']);
    Route::delete('/{id}', [ServicesController::class, 'destroy']);
});

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientsController::class, 'index']);
    Route::post('/', [ClientsController::class, 'store']);
    Route::get('/{id}', [ClientsController::class, 'show']);
    Route::put('/{id}', [ClientsController::class, 'update']);
    Route::delete('/{id}', [ClientsController::class, 'destroy']);
 
});
Route::prefix('garagistes')->group(function () {
    Route::get('/', [GaragistesController::class, 'index']);
    Route::post('/', [GaragistesController::class, 'store']);
    Route::get('/{id}', [GaragistesController::class, 'show']);
    Route::put('/{id}', [GaragistesController::class, 'update']);
    Route::delete('/{id}', [GaragistesController::class, 'destroy']);
    Route::post('/login',[GaragistesController::class, 'login']);
    Route::post('/signup',[GaragistesController::class, 'signup']);
 
});
// Routes for Voitures
Route::prefix('voitures')->group(function () {
    Route::resource('/', VoituresController::class)->except(['create', 'edit']);
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
