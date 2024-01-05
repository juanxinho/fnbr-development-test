<?php

use App\Http\Controllers\DropdownController;
use App\Http\Controllers\UserController;
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

Route::apiResource("v1/usuarios",UserController::class);

Route::get('getCountries', [DropdownController::class, 'getCountries']);
Route::get('getAreas', [DropdownController::class, 'getAreas']);



Route::get('getStates', [DropdownController::class, 'getStates']);
Route::get('getCities', [DropdownController::class, 'getCities']);

Route::get('getPrograms', [DropdownController::class, 'getPrograms']);


