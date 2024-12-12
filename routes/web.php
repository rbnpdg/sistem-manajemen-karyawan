<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ManajerController;

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

    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');               //tampilkan list karyawan
    Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');      //tampilkan form tambah karyawan
    Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');              //simpan data karyawan baru
    Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');       //tampilkan form edit karyawan
    Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');        //update data karyawan
    Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');   //hapus data karyawan

    Route::get('/user', [UserController::class, 'index'])->name('user.index');               //tampilkan list user
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');      //tampilkan form tambah user
    Route::post('/user', [UserController::class, 'store'])->name('user.store');              //simpan data user baru
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');       //tampilkan form edit user
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');        //update data user
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');   //hapus data user

    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index');           //tampilkan page presensi
    Route::get('/token-input', [PresensiController::class, 'token'])->name('token');                 //input token
    Route::post('/generate-qr', [PresensiController::class, 'generateQR'])->name('generate.qr');     //tampilkan qr
    Route::put('/presensi/{id}', [PresensiController::class, 'update'])->name('presensi.update');    //update status kehadiran manual
});

Route::middleware(['auth', 'role:karyawan'])->group(function () {
    Route::get('/dashboard/karyawan', [LoginController::class, 'karyawan'])->name('karyawan.dashboard');                   //tampilkan dashboard karyawan
    Route::get('/karyawan/presensi', [PresensiController::class, 'presensiView'])->name('karyawan.presensi');              //tampilkan page presensi
    Route::get('/karyawan/scan-qr', [PresensiController::class, 'presensiScan'])->name('karyawan.scan');                   //tampilkan page scan qr
    Route::post('/karyawan/verif-presensi', [PresensiController::class, 'verifToken'])->name('karyawan.cek');              //validasi token
    Route::post('/karyawan/store-presensi', [PresensiController::class, 'storePresensi'])->name('karyawan.presensicek');   //simpan presensi
    Route::get('/karyawan/detail', [KaryawanController::class, 'viewData'])->name('karyawan.data');                    //tampilkan view profile
    Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'viewEdit'])->name('karyawan.editdata');             //tampilkan view edit
    Route::put('/karyawan/update-data/{id}', [KaryawanController::class, 'updateKar'])->name('karyawan.updatedata');   //simpan update data
});

Route::middleware(['auth', 'role:manajer'])->group(function () {
    Route::get('/dashboard/manajer', [LoginController::class, 'manajer'])->name('manajer.dashboard');                //tampilkan dashboard maanjer
    Route::get('/manajer/presensi-karyawan', [PresensiController::class, 'viewManajer'])->name('manajer.presensi');  //tampilkan view presesnsi
    Route::get('/manajer/karyawan', [ManajerController::class, 'listKaryawan'])->name('manajer.karyawan');           //tampilkan view list karyawan
});






