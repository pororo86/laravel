<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// === HALAMAN UMUM ===
Route::get('/', fn() => view('home'));
Route::get('/abouts', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

// === DATA PUBLIK (TANPA LOGIN) ===
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
Route::get('/mahasiswa/search', [MahasiswaController::class, 'search'])->name('mahasiswa.search');

Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/{id}', [JadwalController::class, 'show'])->name('jadwal.show');
Route::get('/jadwal/search', [JadwalController::class, 'search'])->name('jadwal.search');

// === AUTENTIKASI ===
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout hanya bisa diakses jika sudah login
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// === ADMIN AREA (HANYA UNTUK USER LOGIN) ===
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'adminIndex'])->name('admin.mahasiswa.index');
    Route::get('/mahasiswa/data', [MahasiswaController::class, 'getData'])->name('admin.mahasiswa.data');
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
    Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('admin.mahasiswa.edit');
    Route::post('/mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
    Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');
});
