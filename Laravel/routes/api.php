<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\alertaController;
use App\Http\Controllers\childrenController;
use App\Http\Controllers\personasController;
use App\Http\Controllers\ficha_childController;
use App\Http\Controllers\motivo_childController;
use App\Http\Controllers\descrip_alertaController;
use App\Http\Controllers\motivo_ingresoController;
use App\Http\Controllers\adulto_responsableController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# RUTAS PROTEGIDAS - PASAR TOKEN 

Route::middleware(['auth:sanctum'])->group(function () {

    ## Logout

    Route::get('logout',[ AuthController::class, 'logout']);

    ## Adulto responsable


});

# Users

Route::post('register',[ AuthController::class, 'register']);
Route::post('login',[ AuthController::class, 'login']);



Route::post('/personas',[ personasController::class, 'store']);

Route::post('/adultos',[ adulto_responsableController::class, 'store']);

Route::get('/VerAdultos',[ adulto_responsableController::class, 'index']);

Route::get('/adultos/{id}', [ adulto_responsableController::class, 'show']);

Route::post('/children', [ childrenController::class, 'store']);

Route::get('/verChildren', [ childrenController::class, 'index']);

Route::get('/children/{id}', [ childrenController::class, 'show']);

Route::patch('/children/{id}/edit', [ childrenController::class, 'update']);

Route::post('/motivoingreso', [ motivo_ingresoController::class, 'store']);

Route::get('/ficha/{id}',[ ficha_childController::class, 'show']);

Route::post('/fichas',[ ficha_childController::class, 'store']);



Route::patch('/update-fichas/{id}',[ ficha_childController::class, 'update']);

Route::post('/alertas',[ alertaController::class, 'store']);

Route::post('/motivo_child', [ motivo_childController::class, 'store']);

Route::post('/descrip_alerta', [ descrip_alertaController::class, 'store']);

Route::get('/verTrabajadores', [ UserController::class, 'index']);

Route::get('/trabajador/{id}', [ UserController::class, 'show']);