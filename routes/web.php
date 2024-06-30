<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/auth-login', [LoginController::class, 'authenticate'])->name('proses-login');
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register', [RegisterController::class, 'register_proses'])->name('register-proses');
});


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [EmployeeController::class, 'index'])->name('profile');
    Route::post('/profile', [EmployeeController::class, 'store'])->name('profile-simpan');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});
