<?php

use App\Http\Controllers\api\AuthApiController;
use App\Http\Controllers\api\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::get('/users-list', [UserController::class, 'getData'])->name('api.users.data');
    Route::post('/logout', [AuthApiController::class, 'logout']);
});