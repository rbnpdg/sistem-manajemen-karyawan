<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JabatanController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index']) -> name('login');                      //tampilkan form login
Route::POST('/login/session', [LoginController::class, 'login']) -> name('loginsession');      //fungsi login
Route::get('/logout', [LoginController::class, 'logout']) -> name('logout');                   //fungsi logout

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', [LoginController::class, 'admin'])->name('admin.dashboard');    //tampilkan dashboard admin
});

Route::middleware(['auth', 'role:karyawan'])->group(function () {
    Route::get('/dashboard/karyawan', [LoginController::class, 'karyawan'])->name('karyawan.dashboard');       //tampilkan dashboard karyawan
});

Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi.index');               //tampilkan list divisi
Route::get('/divisi/create', [DivisiController::class, 'create'])->name('divisi.create');      //tampilkan form tambah divisi
Route::post('/divisi', [DivisiController::class, 'store'])->name('divisi.store');              //simpan data divisi baru
Route::get('/divisi/{id}/edit', [DivisiController::class, 'edit'])->name('divisi.edit');       //tampilkan form edit divisi
Route::put('/divisi/{id}', [DivisiController::class, 'update'])->name('divisi.update');        //update data divisi
Route::delete('/divisi/{id}', [DivisiController::class, 'destroy'])->name('divisi.destroy');   //hapus data divisi

Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');               //tampilkan list jabatan
Route::get('/jabatan/create', [JabatanController::class, 'create'])->name('jabatan.create');      //tampilkan form tambah jabatan
Route::post('/jabatan', [JabatanController::class, 'store'])->name('jabatan.store');              //simpan data jabatan baru
Route::get('/jabatan/{id}/edit', [JabatanController::class, 'edit'])->name('jabatan.edit');       //tampilkan form edit jabatan
Route::put('/jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');        //update data jabatan
Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');   //hapus data jabatan

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');               // tampilkan list karyawan
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');      // tampilkan form tambah karyawan
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');              // simpan data karyawan baru
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');       // tampilkan form edit karyawan
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');        // update data karyawan
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');   // hapus data karyawan
