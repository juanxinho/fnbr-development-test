<?php

use App\Http\Controllers\API\AreaController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\ProgramInformationController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register' , [ProgramInformationController::class, 'register']);

Route::get('areas', [AreaController::class, 'getAreas']);

Route::get('programs/{areaId}', [ProgramController::class, 'getProgramsByAreaId']);