<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LoginController,
    DivisiController,
    JabatanController,
    KaryawanController,
    UserController,
    PresensiController
};

Route::get('/', function () {
    return view('welcome');
});

// Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/session', [LoginController::class, 'login'])->name('loginsession');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', [LoginController::class, 'admin'])->name('admin.dashboard');
});

// Karyawan Routes
Route::middleware(['auth', 'role:karyawan'])->group(function () {
    Route::get('/dashboard/karyawan', [LoginController::class, 'karyawan'])->name('karyawan.dashboard');
    Route::get('/karyawan/profile', [KaryawanController::class, 'viewProfile'])->name('karyawan.profile');
    Route::get('/karyawan/profile/edit', [KaryawanController::class, 'editProfile'])->name('karyawan.profile.edit');
    Route::post('/karyawan/profile/edit', [KaryawanController::class, 'updateProfile'])->name('karyawan.profile.update');
    Route::get('/karyawan/presensi', [PresensiController::class, 'presensiView'])->name('karyawan.presensi');
    Route::post('/karyawan/verif-presensi', [PresensiController::class, 'verifToken'])->name('karyawan.cek');
    Route::post('/karyawan/store-presensi', [PresensiController::class, 'storePresensi'])->name('karyawan.presensicek');
});

// Divisi Routes (using resource)
Route::resource('divisi', DivisiController::class);

// Jabatan Routes (using resource)
Route::resource('jabatan', JabatanController::class);

// Karyawan Routes (using resource)
Route::resource('karyawan', KaryawanController::class);

// User Routes (using resource)
Route::resource('user', UserController::class);

// Presensi Routes
Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index');
Route::put('/presensi/{id}', [PresensiController::class, 'update'])->name('presensi.update');
Route::post('/generate-qr', [PresensiController::class, 'generateQR'])->name('generate.qr');
Route::get('/token-input', [PresensiController::class, 'token'])->name('token');

