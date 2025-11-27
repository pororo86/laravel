<?php

use App\Http\Controllers\api\AuthApiController;
use App\Http\Controllers\api\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

route::middleware('auth:sanctum')->group(function () {
    route::apiResource('users', UserController::class);
    Route::post('/logout', [AuthApiController::class, 'logout']);
});