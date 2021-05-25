<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'cors'], function () {
    Route::prefix('/auth')->group(__DIR__.'/api/auth.php');
    Route::prefix('/warehouse')->group(__DIR__.'/api/warehouseLocation.php');
    Route::prefix('/supply')->group(__DIR__.'/api/supply.php');
    Route::prefix('/staff')->group(__DIR__.'/api/staff.php');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
