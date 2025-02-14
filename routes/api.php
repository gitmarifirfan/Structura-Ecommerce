<?php

use App\Http\Controllers\Api\ApiAuth;
use App\Http\Controllers\api\ApiCartProduct;
use App\Http\Controllers\api\ApiCategory;
use App\Http\Controllers\api\ApiProducts;
use App\Http\Controllers\api\ApiResetPasswordMail;
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
Route::post('auth/register', [ApiAuth::class, 'register']);
Route::post('auth/login', [ApiAuth::class, 'login']);

// Email Verification
Route::get('/email/verify/{id}/{hash}', [ApiVerificationMail::class, 'verifyEmail'])
    ->name('verification.verify.api');

// Email Reset Password
Route::post('auth/forgot-password', [ApiResetPasswordMail::class, 'forgotPassword']);
Route::post('auth/reset-password', [ApiResetPasswordMail::class, 'resetPassword'])->name('password.reset.api');

// ROUTE YANG BUTUH LOGIN (PAKAI TOKEN)
Route::middleware('auth:sanctum')->group(function () {
    // Profile & Authenticated User Routes
    Route::get('auth/profile', [ApiAuth::class, 'profile']);
    Route::put('auth/profile', [ApiAuth::class, 'updateProfile']);
    Route::post('auth/logout', [ApiAuth::class, 'logout']);

    // Cart Routes
    Route::get('/cart', [ApiCartProduct::class, 'getUserCart']);
    Route::put('/cart/{id}', [ApiCartProduct::class, 'updateCartItem']);
    Route::delete('/cart/{id}', [ApiCartProduct::class, 'deleteCartItem']);
});

// Product route
Route::get('/products', [ApiProducts::class, 'getAllProducts']);
Route::post('/products', [ApiProducts::class, 'storeProduct']);
Route::get('/products/{id}', [ApiProducts::class, 'getProductById']);


// Category route
Route::get('/categories', [ApiCategory::class, 'getAllCategories']);
Route::post('/categories', [ApiCategory::class, 'storeCategory']);
Route::get('/categories/{id}', [ApiCategory::class, 'getCategoryById']);

// Category cart

Route::post('/cart/add', [ApiCartProduct::class, 'addToCart']);
