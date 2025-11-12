<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JadwalController;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/abouts', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/mahasiswa/search', [MahasiswaController::class, 'search'])->name('mahasiswa.search');
Route::get('/jadwal/search', [JadwalController::class, 'search'])->name('jadwal.search');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

Route::get('/admin/mahasiswa', [MahasiswaController::class, 'adminIndex'])->name('admin.mahasiswa.index');
Route::get('/admin/mahasiswa/data', [MahasiswaController::class, 'getData'])->name('admin.mahasiswa.data');
Route::post('/admin/mahasiswa/store', [MahasiswaController::class, 'store'])->name('admin.mahasiswa.store');
Route::get('/admin/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('admin.mahasiswa.edit');
Route::post('/admin/mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('admin.mahasiswa.update');
Route::delete('/admin/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('admin.mahasiswa.destroy');

Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/{id}', [JadwalController::class, 'show'])->name('jadwal.show');

