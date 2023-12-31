<?php

use App\Http\Controllers\API\AuthController;
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
Route::controller(\App\Http\Controllers\API\AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});


Route::middleware('auth:sanctum')->group(function() {
    Route::get('/users', [\App\Http\Controllers\API\AuthController::class,'index'])->name('index');
    Route::post('/pdf-upload', [\App\Http\Controllers\API\ImageController::class,'upload'])->name('upload');
});
