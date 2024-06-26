<?php

use App\Http\Controllers\ApiController;
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

Route::get('/minis', [ApiController::class, 'findMinis']);
Route::get('/keywords', [ApiController::class, 'fetchKeyword']);
Route::get('/upgrades', [ApiController::class, 'fetchUpgrade']);
Route::get('/markers', [ApiController::class, 'fetchMarker']);
Route::get('/terrain', [ApiController::class, 'fetchTerrain']);
Route::get('/condition', [ApiController::class, 'fetchCondition']);
Route::get('/questions', [ApiController::class, 'fetchQuestion']);
Route::get('/summons', [ApiController::class, 'fetchSummons']);
Route::get("/abilities", [ApiController::class, "fetchAbilities"]);
Route::get("/campaign", [ApiController::class, "fetchCampaign"]);
