<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\InfoFuniberController;
use App\Http\Controllers\ProgramController;
use Illuminate\Http\Request;
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

Route::get('/areas', [AreaController::class, 'index']);
Route::get('/areas/{id}/programs', [ProgramController::class, 'listByArea']);

Route::post('/contacts', [InfoFuniberController::class, 'store']);
