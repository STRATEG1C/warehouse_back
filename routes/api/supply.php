<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplyController;

Route::get('/supplies', [SupplyController::class, 'getList']);
Route::get('/supplies/{id}', [SupplyController::class, 'getById']);
Route::put('/supplies/{id}/status/{statusId}', [SupplyController::class, 'updateStatus']);
Route::middleware('auth:api')->post('/supplies/{id}/pallet/{productId}', [SupplyController::class, 'unloadPallet']);

Route::post('/start-unloading/{id}', [SupplyController::class, 'startUnloading']);
