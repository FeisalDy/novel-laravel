<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\ChapterController;
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


Route::group([
    'middleware' => 'auth:sanctum'
], function () {
    Route::apiResource('/novels', NovelController::class);

    Route::apiResource('/chapters', ChapterController::class);

    Route::get('/user', UserController::class);
});
