<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/search', [BookController::class, 'search']);
Route::get('/books/popular', [BookController::class, 'getPopular']);



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

   
    Route::middleware(['admin.access'])->group(function () {
        Route::post('/books', [BookController::class, 'store']);       
        Route::put('/books/{id}', [BookController::class, 'update']);  
        Route::delete('/books/{id}', [BookController::class, 'destroy']); 
        Route::get('/admin/stats', [BookController::class, 'stats']);
        Route::patch('/books/{id}/condition', [BookController::class, 'updateCondition']); 
    });
});