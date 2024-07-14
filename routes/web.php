<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/setting/run', [SettingController::class, 'run'])->name('setting.run');
Route::get('/', [PageController::class, 'home'])->name('home');

Route::middleware('guest')->group(function() {
    
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/forgot_password', [AuthController::class, 'forgotPassword'])->name('password.forgot');
    Route::get('/reset_password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');

});

Route::middleware('auth')->group(function(){

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

});
