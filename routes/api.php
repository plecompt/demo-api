<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Public routes
Route::get('/users', [UserController::class, 'getUsers']);
Route::get('/users/{id}', [UserController::class, 'getUser']);

Route::post('/users', [UserController::class, 'addUser']);
Route::post('/login', [AuthController::class, 'login']);

// Private routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users-with-passwords', [UserController::class, 'getUsersWithPasswords']);
});