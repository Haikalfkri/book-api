<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RolesController;

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


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth.custom')->group(function () {
    Route::get('books', [BookController::class, 'index']);       
    Route::post('books', [BookController::class, 'store']);      
    Route::get('books/{book}', [BookController::class, 'show']);   
    Route::put('books/{book}', [BookController::class, 'update']); 
    Route::delete('books/{book}', [BookController::class, 'destroy']);
    Route::post('roles', [RolesController::class, 'store']);
    Route::get('roles', [RolesController::class, 'index']);
});