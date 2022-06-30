<?php

use App\Http\Controllers\Funiber\Area\AreaController;
use App\Http\Controllers\Funiber\Form\FormController;
use App\Http\Controllers\Funiber\Program\ProgramController;
use Illuminate\Support\Facades\Route;

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
/* Rutas Area */

Route::get("areas", [AreaController::class, 'getAreas']);


/* Rutas Program */

Route::get("programs", [ProgramController::class, 'getPrograms']);

/* Rutas Form */

Route::get("form/index", [FormController::class, 'index']);
Route::post("form/store", [FormController::class, 'store']);
