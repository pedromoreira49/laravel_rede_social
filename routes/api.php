<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

/* Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::post('/', [PostController::class, 'store']);
    Route::get('/{id}', [PostController::class, 'show']);
    Route::put('/{id}', [PostController::class,  'update']);
    Route::delete('/{id}', [PostController::class, 'destroy']);
}); */

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
/* Route::middleware('auth:sanctum')->group(function () {
    // Rotas protegidas que exigem autenticação
    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);
}); */

Route::apiResource('posts', PostController::class)
    ->parameters([
        'posts' => 'post'
    ])->middleware('auth:sanctum');
