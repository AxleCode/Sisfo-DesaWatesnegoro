<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;

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

         // Routes untuk about slider
        Route::post('/about-slider/tambah', [PengaturanController::class, 'simpanAboutSlider'])->name('admin.pengaturan.about-slider.tambah');
        Route::post('/about-slider/update/{id}', [PengaturanController::class, 'updateAboutSlider'])->name('admin.pengaturan.about-slider.update');
        Route::delete('/about-slider/hapus/{id}', [PengaturanController::class, 'hapusAboutSlider'])->name('admin.pengaturan.about-slider.hapus');
        
        // Routes untuk dusun
        Route::post('/dusun/tambah', [PengaturanController::class, 'simpanDusun'])->name('admin.pengaturan.dusun.tambah');
        Route::post('/dusun/update/{id}', [PengaturanController::class, 'updateDusun'])->name('admin.pengaturan.dusun.update');
        Route::delete('/dusun/hapus/{id}', [PengaturanController::class, 'hapusDusun'])->name('admin.pengaturan.dusun.hapus');
    });
    
    // Route untuk file management
    Route::prefix('file')->group(function () {
        Route::get('/', [FileController::class, 'index'])->name('admin.file');
        Route::post('/tambah', [FileController::class, 'store'])->name('admin.file.tambah');
        Route::post('/update/{id}', [FileController::class, 'update'])->name('admin.file.update');
        Route::delete('/hapus/{id}', [FileController::class, 'destroy'])->name('admin.file.hapus');
        Route::get('/download/{id}', [FileController::class, 'download'])->name('file.download');
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
