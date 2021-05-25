<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'getList']);
Route::middleware("auth:api")->get('/tasks', [UserController::class, 'getTaskAssignments']);
Route::get('/tasks/{id}', [UserController::class, 'getTaskAssignment']);
Route::put('/tasks/{id}/finish', [UserController::class, 'finishTask']);
