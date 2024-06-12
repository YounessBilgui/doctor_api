<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
    Route::get('user', [AuthController::class, 'user']); // WORKING 
    Route::get('appointments',[AppointmentController::class, 'index']); // DONE
    Route::post('appointment/store',[AppointmentController::class, 'store']); // DONE
    Route::get('appointment/{id}',[AppointmentController::class, 'show']); // DONE
    Route::put('appointment/{id}/update',[AppointmentController::class, 'update']); // DONE
    Route::delete('appointment/{id}/delete',[AppointmentController::class, 'destroy']); // DONE
    Route::get('appointment/{id}/download',[HomeController::class, 'downloadPdf']); // DONE 
    Route::post('admin/store', [AdminController::class, 'CreateAccount']); // DONE
    Route::put('admin/{id}/update', [AdminController::class, 'EditAccount']); // DONE 
    Route::delete('admin/{id}/delete', [AdminController::class, 'DeleteAccount']); // DONE
    Route::put('appointment/{id}/valide',[HomeController::class, 'appValidation']); // DONE 

    
    
});

