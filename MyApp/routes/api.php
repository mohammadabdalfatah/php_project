<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\CartController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

   
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);

  
    Route::get('/products',        [ProductController::class, 'index']);
    Route::get('/products/{id}',   [ProductController::class, 'show']);

    
    Route::get('/orders',              [OrderController::class, 'index']);
    Route::post('/orders',             [OrderController::class, 'store']);
    Route::get('/orders/{order}',      [OrderController::class, 'show']);

    
    Route::get('/cart',                [CartController::class, 'index']);
    Route::post('/cart',               [CartController::class, 'store']);
    Route::put('/cart/{id}',           [CartController::class, 'update']);
    Route::delete('/cart/{id}',        [CartController::class, 'destroy']);
});
