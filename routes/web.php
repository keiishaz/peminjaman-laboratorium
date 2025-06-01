<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth:petugas')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/tambah', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/simpan', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{id}/update', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}/hapus', [BarangController::class, 'destroy'])->name('barang.destroy');

    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
    Route::get('/peminjaman/tambah', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman/simpan', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
    Route::post('/peminjaman/{id}/update', [PeminjamanController::class, 'update'])->name('peminjaman.update');
    Route::delete('/peminjaman/{id}/hapus', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

    Route::get('/perbaikan', [PerbaikanController::class, 'index'])->name('perbaikan.index');
    Route::get('/perbaikan/create', [PerbaikanController::class, 'create'])->name('perbaikan.create');
    Route::post('/perbaikan', [PerbaikanController::class, 'store'])->name('perbaikan.store');
    Route::get('/perbaikan/{id}/edit', [PerbaikanController::class, 'edit'])->name('perbaikan.edit');
    Route::put('/perbaikan/{id}', [PerbaikanController::class, 'update'])->name('perbaikan.update');
    Route::delete('/perbaikan/{id}', [PerbaikanController::class, 'destroy'])->name('perbaikan.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});