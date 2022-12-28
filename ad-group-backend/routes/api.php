<?php

use App\Http\Controllers\Api\AuditLogController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\IpAddressController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('registration', 'registration');
});


//Authenticate Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('check-token', 'checkToken');
        Route::post('logout', 'logout');
    });

    Route::controller(IpAddressController::class)->group(function () {
        Route::get('ip-address', 'index');
        Route::post('ip-address', 'store');
        Route::put('ip-address/{id}', 'update');
    });

    Route::get('audit-logs', [AuditLogController::class, 'index']);
});
