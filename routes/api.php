<?php

use App\Http\Controllers\Api\IncomesController;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\SalesController;
use App\Http\Controllers\Api\StocksController;
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

Route::get('/incomes', [IncomesController::class, 'index'])
    ->name('api.incomes.index');
Route::get('/orders',  [OrdersController::class, 'index'])
    ->name('api.orders.index');
Route::get('/sales',   [SalesController::class, 'index'])
    ->name('api.sales.index');
Route::get('/stocks',  [StocksController::class, 'index'])
    ->name('api.stocks.index');