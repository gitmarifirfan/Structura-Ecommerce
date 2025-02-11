<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/dashboard', function () {
//     return view('clients.dashbord');
// })->name('dashboard');

// Auth Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Email Verification
Route::get('/verify/{id}/{hash}', [VerificationController::class, 'verifyEmail'])->name('verification.verify');

// Password Reset
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetPasswordEmail'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

// Middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('clients.dashbord');
    })->name('dashboard');

    // Profil
    Route::get('/dashboard/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/dashboard/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
