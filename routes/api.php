<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BienImmobilierController;
use App\Http\Controllers\Api\ReservationController;
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

Route::get('annonces', [\App\Http\Controllers\Api\AnnonceController::class, 'index']);


Route::get('annonces/{id}', [\App\Http\Controllers\Api\AnnonceController::class, 'show']);


Route::apiResource('reservations', ReservationController::class);
