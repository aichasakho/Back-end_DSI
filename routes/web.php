<?php

use App\Http\Controllers\ParcelleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\ProprioController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AppartementController;
use App\Http\Controllers\BienImmobilierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth.admin'])->group(function(){

    // ADMIN CONTROLLER
    Route::resource('bienImmobilier',BienImmobilierController::class);
    Route::resource('appartement', AppartementController::class);
    Route::resource('parcelle', ParcelleController::class);


    Route::get('homeAdmin',[AdminController::class,'home'])->name('home.admin');
    Route::get('admin-liste-users/',[AdminController::class,'index'])->name('listes.admin.users');
    Route::post('admin-add-users/',[AdminController::class,'store'])->name('add.admin.users');

    // Route for immeuble
    Route::get('admin-add-immeuble/',[BienImmobilierController::class,'addImmeuble'])
      ->name('add.immeuble');
    Route::post('admin-store-immeuble/',[BienImmobilierController::class,'storeImmeuble'])
      ->name('store.immeuble');
    Route::get('admin-edit-immeuble/{immeuble}',[BienImmobilierController::class,'editImmeuble'])
      ->name('edit.immeuble');
    Route::post('admin-update-immeuble/{immeuble}',[BienImmobilierController::class,'updateImmeuble'])
      ->name('update.immeuble');


  // Route for maison
  Route::get('admin-add-maison/',[BienImmobilierController::class,'addMaison'])
    ->name('add.maison');
  Route::post('admin-store-maison/',[BienImmobilierController::class,'storeMaison'])
    ->name('store.maison');
  Route::get('admin-edit-maison/{maison}',[BienImmobilierController::class,'editMaison'])
    ->name('edit.maison');
  Route::post('admin-update-maison/{maison}',[BienImmobilierController::class,'updateMaison'])
    ->name('update.maison');

  // Route for terrain
  Route::get('admin-add-terrain/',[BienImmobilierController::class,'addTerrain'])
    ->name('add.terrain');
  Route::post('admin-store-terrain/',[BienImmobilierController::class,'storeTerrain'])
    ->name('store.terrain');
  Route::get('admin-edit-terrain/{terrain}',[BienImmobilierController::class,'editTerrain'])
    ->name('edit.terrain');
  Route::post('admin-update-terrain/{terrain}',[BienImmobilierController::class,'updateTerrain'])
    ->name('update.terrain');

});

Route::get('',[AdminController::class,'login'])->name('admin.login');
Route::get('/register',[AdminController::class,'register'])->name('admin.register');
Route::post('Authentification-admin/',[AdminController::class,'doLogin'])->name('doLogin.login');
Route::post('Authentification-admin/register',[AdminController::class,'doRegister'])->name('doRegister.register');

