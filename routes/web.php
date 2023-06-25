<?php

use App\Http\Controllers\Api\EventController as EventApiController;
use App\Http\Controllers\Api\EventUserController;
use App\Http\Controllers\Api\UserEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return response()->redirectTo('/home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('events', EventController::class)->except('index');
    Route::post('events/{id}/keep', [EventController::class, 'keepEvent'])->name('events.keep');

    Route::resource('users', UserController::class);

    Route::resource('events', EventApiController::class)->only('index');
    Route::resource('users.events', UserEventController::class)->only('index');
    Route::resource('events.users', EventUserController::class)->only('index');
});

