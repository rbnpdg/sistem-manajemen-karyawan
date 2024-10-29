<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;

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

Route::get('/', function () {return view('login');}) -> name('login.form');

Route::get('/admin', function () {
    return view('admin/admin');
})->name('admin.dashboard');

// routes/web.php
use App\Http\Controllers\DivisiController;

// Menampilkan semua divisi
Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi.index');

// Menampilkan form tambah divisi
Route::get('/divisi/create', [DivisiController::class, 'create'])->name('divisi.create');

// Menyimpan data divisi baru
Route::post('/divisi', [DivisiController::class, 'store'])->name('divisi.store');

// Menampilkan form edit divisi
Route::get('/divisi/{id}/edit', [DivisiController::class, 'edit'])->name('divisi.edit');

// Mengupdate data divisi
Route::put('/divisi/{id}', [DivisiController::class, 'update'])->name('divisi.update');

// Menghapus data divisi
Route::delete('/divisi/{id}', [DivisiController::class, 'destroy'])->name('divisi.destroy');


//Route login
Route::post('/auth', [AuthController::class, 'login']) -> name('login');

Route::get('/karyawan/dashboard', [KaryawanController::class, 'index'])->name('karyawan.dashboard');
Route::get('/manajer/dashboard', [ManajerController::class, 'index'])->name('manajer.dashboard');

