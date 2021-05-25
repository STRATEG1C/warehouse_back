<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::post('/login', [AuthController::class, 'loginViaApi']);

Route::middleware('auth:api')->group(function() {
    Route::get('/current-user', [AuthController::class, 'getCurrentUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
