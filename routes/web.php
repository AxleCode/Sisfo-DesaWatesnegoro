<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

// Routes untuk berita di frontend (harus di luar middleware auth)
Route::get('/berita', [NewsController::class, 'list'])->name('berita');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.show');

// Route untuk authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Tambahkan sebelum group middleware auth agar pin di peta home tampil
Route::get('/data/map', [MapController::class, 'getMapData'])->name('peta.data');


// Route yang membutuhkan authentication
Route::middleware('auth')->group(function () {
    
    // Route untuk admin
    Route::middleware('check.role:admin,staff')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard.dashboard');
        })->name('admin.dashboard');
    });

    // Route untuk dashboard
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/dashboard/chart-data', [DashboardController::class, 'getChartData'])->name('admin.dashboard.chart');
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

    // Route untuk setup website
    Route::prefix('setup')->group(function () {
        Route::get('/', [SetupController::class, 'index'])->name('admin.setup');
        Route::post('/simpan', [SetupController::class, 'store'])->name('admin.setup.simpan');
    });

    // Routes untuk berita di admin
    Route::prefix('admin/berita')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('admin.berita');
        Route::get('/tambah', [NewsController::class, 'create'])->name('admin.berita.tambah');
        Route::post('/tambah', [NewsController::class, 'store'])->name('admin.berita.simpan');
        Route::get('/edit/{news}', [NewsController::class, 'edit'])->name('admin.berita.edit');
        Route::post('/update/{news}', [NewsController::class, 'update'])->name('admin.berita.update');
        Route::delete('/hapus/{news}', [NewsController::class, 'destroy'])->name('admin.berita.hapus');
    });

    // Routes untuk kategori
    Route::prefix('admin/kategori')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.kategori');
        Route::post('/tambah', [CategoryController::class, 'store'])->name('admin.kategori.tambah');
        Route::post('/update/{category}', [CategoryController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/hapus/{category}', [CategoryController::class, 'destroy'])->name('admin.kategori.hapus');
    });

    // Routes untuk peta
    Route::prefix('peta')->group(function () {
        Route::get('/', [MapController::class, 'index'])->name('admin.peta');
        Route::post('/', [MapController::class, 'store'])->name('admin.peta.simpan');
        Route::get('/{map}', [MapController::class, 'show'])->name('admin.peta.detail');
        Route::put('/{map}', [MapController::class, 'update'])->name('admin.peta.update');
        Route::delete('/{map}', [MapController::class, 'destroy'])->name('admin.peta.hapus');
    });

    // Route dashboard umum yang mengarahkan berdasarkan role
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});