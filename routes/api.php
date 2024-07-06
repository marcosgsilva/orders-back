<?php

use App\Http\Controllers\OrderController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/orders/monthly-status', [OrderController::class, 'getByStatus']);
Route::get('/orders/list', [OrderController::class, 'index']);
Route::get('/orders/{id}', [OrderController::class, 'show']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
