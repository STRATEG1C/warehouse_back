<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/orders', [OrderController::class, 'getList']);
Route::get('/orders/{id}', [OrderController::class, 'getById']);
Route::put('/orders/{id}', [OrderController::class, 'update']);
