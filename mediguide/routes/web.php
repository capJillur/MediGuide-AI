<?php

use App\Http\Controllers\{AuthController, AdminController, DashboardController, PasswordResetController};
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('home');
Route::get('/register/{role}', [AuthController::class, 'showRegister'])->whereIn('role', ['user', 'doctor'])->name('register');
Route::post('/register/{role}', [AuthController::class, 'register'])
    ->whereIn('role', ['user', 'doctor'])
    ->middleware('throttle:10,1')
    ->name('register.post');
Route::get('/otp', [AuthController::class, 'showOtp'])->name('otp');
Route::post('/otp', [AuthController::class, 'verifyOtp'])
    ->middleware('throttle:5,1')
    ->name('otp.verify');
Route::post('/otp/resend', [AuthController::class, 'resendOtp'])
    ->middleware('throttle:3,1')
    ->name('otp.resend');
Route::get('/login/admin', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/login/admin', [AuthController::class, 'adminLogin'])
    ->middleware('throttle:5,1')
    ->name('admin.login.post');

Route::get('/login/{portal?}', [AuthController::class, 'showLogin'])
    ->whereIn('portal', ['patient', 'doctor'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('login.post');

Route::get('/forgot-password/{portal}', [PasswordResetController::class, 'createRequest'])
    ->whereIn('portal', ['patient', 'doctor', 'admin'])
    ->name('password.request');
Route::post('/forgot-password/{portal}', [PasswordResetController::class, 'sendLink'])
    ->whereIn('portal', ['patient', 'doctor', 'admin'])
    ->middleware('throttle:3,1')
    ->name('password.email');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'createReset'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])
    ->middleware('throttle:5,1')
    ->name('password.update');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', DashboardController::class)->middleware('auth')->name('dashboard');

Route::middleware(['auth', Role::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/{account}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::post('/{account}/approve', [AdminController::class, 'approve'])->name('approve');
    Route::put('/{account}', [AdminController::class, 'update'])->name('update');
    Route::delete('/{account}', [AdminController::class, 'destroy'])->name('destroy');
});
