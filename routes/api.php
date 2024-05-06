<?php

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

Route::post('register', \App\Http\Controllers\Api\Auth\RegisterController::class);
Route::post('login', \App\Http\Controllers\Api\Auth\LoginController::class);

Route::apiResource('todos', \App\Http\Controllers\Api\TodoController::class)->middleware('auth:sanctum');

Route::post('user/avatar', \App\Http\Controllers\Api\User\UpdateAvatarController::class)->middleware('auth:sanctum');
