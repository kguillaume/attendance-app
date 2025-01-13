<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\MembreController;
use App\Http\Controllers\Api\EgliseController;
use App\Http\Controllers\Api\TribuController;
use App\Http\Controllers\Api\CulteController;
use App\Http\Controllers\Api\AttendanceController;

Route::get('v1/user', function (Request $request) {
    return $request->user();
    //return response()->json([ 'valid' => auth()->check() ]);
})->middleware('auth:sanctum');

Route::post('v1/register', [AuthenticationController::class, 'register']);

Route::post('v1/login', [AuthenticationController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'v1'], function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::post('/member', [MembreController::class, 'store']);
    Route::get('/member/{member}', [MembreController::class, 'show']);
    Route::put('/member/{member}/edit', [MembreController::class, 'update']);
    Route::get('/members', [MembreController::class, 'index']);
    Route::post('/eglise', [EgliseController::class, 'store']);
    Route::put('/eglise/{eglise}/edit', [EgliseController::class, 'update']);
    Route::get('/eglises', [EgliseController::class, 'index']);
    Route::post('/tribu', [TribuController::class, 'store']);
    Route::get('/tribus', [TribuController::class, 'index']);
    Route::post('/culte', [CulteController::class, 'store']);
    Route::get('/cultes', [CulteController::class, 'index']);
    Route::get('/culte/{culte}', [CulteController::class, 'show']);
    Route::put('/culte/{culte}/edit', [CulteController::class, 'update']);
    Route::post('/attendance', [AttendanceController::class, 'store']);
    Route::get('/attendances', [AttendanceController::class, 'index']);
    

});