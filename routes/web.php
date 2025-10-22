<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

route::get('/abouts', [AboutController::class, 'index']);
route::get('/contact', [ContactController::class, 'index']);

Route::get('/mahasiswa/search', [MahasiswaController::class, 'search'])->name('mahasiswa.search');
Route::get('/jadwal/search', [JadwalController::class, 'search'])->name('jadwal.search');

route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

