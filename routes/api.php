<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\ApiAuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::post('/auth', [UserController::class, 'register']);
Route::post('/auth/login', [UserController::class, 'login']);
Route::middleware(ApiAuthMiddleware::class)->group(function () {
    Route::get('/auth/me', [UserController::class, 'get']);
    Route::get('/students', [StudentController::class, 'get']);
    Route::get('/students/{id}', [StudentController::class, 'getById']);
    Route::post('/students', [StudentController::class, 'create']);
});
