<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PekerjaanController;
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
    Route::get('/profile_e', [EmployeeController::class, 'profile_e'])->name('profile-edit');
    Route::post('/profile', [EmployeeController::class, 'profile_store'])->name('profile-simpan');

    Route::get('/pekerjaan', [PekerjaanController::class, 'pekerjaan'])->name('pekerjaan');
    Route::get('/pekerjaan_e', [PekerjaanController::class, 'pekerjaan_e'])->name('pekerjaan-tambah');
    Route::get('/pekerjaan/{id}/edit', [PekerjaanController::class, 'pekerjaan_edit'])->name('pekerjaan-edit');
    Route::put('/pekerjaan/{id}', [PekerjaanController::class, 'pekerjaan_edit_update'])->name('pekerjaan-update');
    Route::post('/pekerjaan', [PekerjaanController::class, 'pekerjaan_store'])->name('pekerjaan-simpan');
    Route::delete('/pekerjaan_hapus/{id}', [PekerjaanController::class, 'pekerjaan_hapus'])->name('pekerjaan-destroy');

    Route::get('/pelatihan', [EmployeeController::class, 'index'])->name('pelatihan');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});
