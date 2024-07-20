<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\MembreController;
use App\Http\Controllers\Api\EgliseController;
use App\Http\Controllers\Api\TribuController;
use App\Http\Controllers\Api\CulteController;
use App\Http\Controllers\Api\AttendanceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthenticationController::class, 'register']);

Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::post('/member', [MembreController::class, 'store']);
    Route::get('/member/{membre}', [MembreController::class, 'show']);
    Route::get('/members', [MembreController::class, 'index']);
    Route::post('/eglise', [EgliseController::class, 'store']);
    Route::get('/eglises', [EgliseController::class, 'index']);
    Route::post('/tribu', [TribuController::class, 'store']);
    Route::get('/tribus', [TribuController::class, 'index']);
    Route::post('/culte', [CulteController::class, 'store']);
    Route::get('/cultes', [CulteController::class, 'index']);
    Route::get('/culte/{culte}', [CulteController::class, 'show']);
    Route::post('/attendance', [AttendanceController::class, 'store']);
    Route::get('/attendances', [AttendanceController::class, 'index']);

});