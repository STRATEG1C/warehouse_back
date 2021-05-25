<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationTypeController;
use App\Http\Controllers\StorageTypeController;
use App\Http\Controllers\WarehouseLocationController;

Route::get('/location-types', [LocationTypeController::class, 'getList']);
Route::get('/storage-types', [StorageTypeController::class, 'getList']);

Route::get('/locations', [WarehouseLocationController::class, 'getList']);
Route::get('/locations/{id}', [WarehouseLocationController::class, 'getById']);
Route::post('/locations', [WarehouseLocationController::class, 'create']);
Route::put('/locations/{id}', [WarehouseLocationController::class, 'update']);
Route::delete('/locations', [WarehouseLocationController::class, 'delete']);
