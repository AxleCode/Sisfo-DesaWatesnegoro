<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

// Route untuk authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk halaman admin (login form)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Route yang membutuhkan authentication
Route::middleware('auth')->group(function () {
    // Hapus route dashboard umum atau beri nama yang berbeda
    // Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
    // Route untuk admin
    Route::middleware('check.role:admin,staff')->prefix('login')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.dashboard');
        })->name('admin.dashboard');
    });

    // Route untuk pengaturan
    Route::prefix('pengaturan')->group(function () {
        Route::get('/informasi', [PengaturanController::class, 'informasi'])->name('admin.pengaturan.informasi');
        Route::post('/slider/tambah', [PengaturanController::class, 'simpanSlider'])->name('admin.pengaturan.slider.tambah');
        Route::post('/slider/update/{id}', [PengaturanController::class, 'updateSlider'])->name('admin.pengaturan.slider.update');
        Route::delete('/slider/hapus/{id}', [PengaturanController::class, 'hapusSlider'])->name('admin.pengaturan.slider.hapus');
    });
    
    // Route untuk warga
    // Route::middleware('check.role:warga')->prefix('warga')->group(function () {
    //     Route::get('/dashboard', function () {
    //         return view('warga.dashboard');
    //     })->name('warga.dashboard');
    // });
    
    // Route dashboard umum yang mengarahkan berdasarkan role
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});
