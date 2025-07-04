<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SocialiteController;
use Laravel\Socialite\Facades\Socialite;
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

    Route::controller(SocialiteController::class)->group(function () {
        Route::get('/auth/redirection/{provider}', 'authProviderRedirect')->name('auth.redirection');

        Route::get('/auth/{provider}/callback', 'socialAuthentication')->name('auth.callback');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('verified');

    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');

    Route::post('/email/verification-notification', [AuthController::class, 'resendEmail'])->middleware(['throttle:6,1'])->name('verification.send');

    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    
    Route::controller(SettingsController::class)->group(function (){
        Route::get('/setting', 'index')->name('setting');
        Route::get('/settings/{id}/edit', 'edit')->name('settings.edit');
        Route::patch('/settings/{user}', 'update')->name('settings.update');
        Route::delete('/settings/{user}', 'deleteAccount')->name('settings.delete');
    });

    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
    Route::resource('/category', CategoryController::class);
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/wallet', WalletController::class);
    Route::resource('/budget', BudgetController::class);
    Route::get('/savings/{id}/transaction', [SavingController::class, 'transaction'])->name('savings.transaction');
    Route::post('/savings/transaction/store', [SavingController::class, 'transactionStore'])->name('savings.transaction.store');
    Route::resource('/savings', SavingController::class);
});
