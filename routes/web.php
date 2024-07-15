<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/{slug?}/portal/support', [PageController::class, 'supportPortal'])->name('portal.support.index');
Route::get('/{slug?}/portal', [PageController::class, 'portal'])->name('portal.index');

Route::get('/setting/run', [SettingController::class, 'run'])->name('setting.run');
Route::get('/', [PageController::class, 'home'])->name('home');

Route::middleware('guest')->group(function() {
    
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/forgot_password', [AuthController::class, 'forgotPassword'])->name('password.forgot');
    Route::get('/reset_password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');

});

Route::middleware('auth')->group(function(){
    
    Route::get('tickets/{id}/details', [TicketController::class, 'show'])->name('tickets.show');
    Route::get('tickets/{entity}', [TicketController::class, 'index'])->name('tickets.index');
    
    Route::get('/entities', [EntityController::class, 'index'])->name('entities.index');
    Route::get('/entities/{id}', [EntityController::class, 'show'])->name('entities.show');
    Route::get('/entities/{id}/edit', [EntityController::class, 'edit'])->name('entities.edit');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

});
