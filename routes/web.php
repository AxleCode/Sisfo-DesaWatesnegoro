<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    
    // Route untuk warga
    // Route::middleware('check.role:warga')->prefix('warga')->group(function () {
    //     Route::get('/dashboard', function () {
    //         return view('warga.dashboard');
    //     })->name('warga.dashboard');
    // });
    
    // Route dashboard umum yang mengarahkan berdasarkan role
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});