<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('register',[AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user', [AuthController::class, 'user']);

    Route::get('appointments',[AppointmentController::class, 'index']);

    Route::post('appointments/store',[AppointmentController::class, 'store']);

    Route::put('appointment/{id}',[AppointmentController::class, 'show']);
    
    Route::put('appointment/{id}/update',[AppointmentController::class, 'update']);
    Route::delete('appointment/{id}/delete',[AppointmentController::class, 'destroy']);
});

