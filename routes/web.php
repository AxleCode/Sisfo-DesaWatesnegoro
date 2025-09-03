<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaturanController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

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
        // Route::post('/informasi', [PengaturanController::class, 'simpanInformasi'])->name('admin.pengaturan.simpan-informasi');
        // Route::post('/media-sosial', [PengaturanController::class, 'simpanMediaSosial'])->name('admin.pengaturan.simpan-media-sosial');
        // Route::post('/seo', [PengaturanController::class, 'simpanSEO'])->name('admin.pengaturan.simpan-seo');
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
