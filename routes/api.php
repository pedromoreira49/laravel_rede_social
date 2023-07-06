<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('posts', PostController::class)
    ->parameters([
        'posts' => 'post'
    ])->middleware('ability:user,admin');

    Route::apiResource('users', UserController::class)
        ->parameters([
            'users' => 'user'
        ])->middleware('ability:admin');

    Route::apiResource('products', ProductController::class)
        ->parameters([
            'products' => 'product'
        ])->middleware('ability:user,manager,admin');
});

