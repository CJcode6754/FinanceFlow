<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
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

    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');

    Route::post('/email/verification-notification', [AuthController::class, 'resendEmail'])->middleware(['throttle:6,1'])->name('verification.send');

    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::get('/setting', [SettingsController::class, 'index'])->name('setting');

    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
    Route::resource('/category', CategoryController::class);
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/wallet', WalletController::class);
    Route::resource('/budget', BudgetController::class);
    Route::get('/savings/{id}/transaction', [SavingController::class, 'transaction'])->name('savings.transaction');
    Route::post('/savings/transaction/store', [SavingController::class, 'transactionStore'])->name('savings.transaction.store');
    Route::resource('/savings', SavingController::class);
});