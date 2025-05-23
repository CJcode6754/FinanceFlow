<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register/store', [AuthController::class, 'store'])->name('register.store');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');

    Route::get('/forgot-password', [ResetPasswordController::class, 'resetRequest'])->name('password.request');

    Route::post('/forgot-password', [ResetPasswordController::class, 'ResetPassword'])->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPasswordForm'])->name('password.reset');

    Route::post('/reset-password', [ResetPasswordController::class, 'passwordUpdate'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('verified');
    Route::get('/wallet', [DashboardController::class, 'wallet'])->name('wallet');

    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');

    Route::post('/email/verification-notification', [AuthController::class, 'resendEmail'])->middleware(['throttle:6,1'])->name('verification.send');

    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
});