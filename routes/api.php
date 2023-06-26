<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\EventUserController;
use App\Http\Controllers\Api\UserEventController;
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

Route::group(['prefix' => 'auth'], function () {
    Route::post('/token', [AuthController::class, 'token']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('events', EventController::class)->only('index');
    Route::resource('users.events', UserEventController::class)->only('index');
    Route::resource('events.users', EventUserController::class)->only('index');
});
