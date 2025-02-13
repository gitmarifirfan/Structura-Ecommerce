<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\api\ApiVerificationMail;
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

// REGISTER DAN LOGIN
Route::post('auth/register', [ApiController::class, 'register']);
Route::post('auth/login', [ApiController::class, 'login']);

// Email Verification
Route::get('/email/verify/{id}/{hash}', [ApiVerificationMail::class, 'verifyEmail'])
    ->name('verification.verify.api');

// ROUTE YANG BUTUH LOGIN (PAKAI TOKEN)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('auth/profile', [ApiController::class, 'profile']);
    Route::put('auth/profile', [ApiController::class, 'updateProfile']);
    Route::post('auth/logout', [ApiController::class, 'logout']);
});

