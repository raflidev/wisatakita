<?php

use App\Http\Controllers\QRController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WisataController;
use App\Models\Wisata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WisataController::class, 'index'])->name('wisata.home');
Route::get('/detail/{id}', [WisataController::class, 'detail'])->name('wisata.detail');
Route::get('/rekomendasi', [WisataController::class, 'rekomendasi'])->name('wisata.rekomendasi');
Route::get('/list_wisata', [WisataController::class, 'listWisata'])->name('wisata.list');
Route::get('/list_wisata/{wisata}', [WisataController::class, 'listWisataSearch'])->name('wisata.listSearch');

// Login
Route::get('/login', [UserController::class, 'index'])->name('user.login');
Route::get('/admin/login', [UserController::class, 'login_admin'])->name('admin.login');
Route::post('/login', [UserController::class, 'login'])->name('user.proseslogin');
// Register
Route::get('/daftar', [UserController::class, 'daftar'])->name('user.daftar');
Route::post('/daftar', [UserController::class, 'store'])->name('user.prosesdaftar');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

// Pembayaran Transaksi
Route::post('/transaksi', [WisataController::class, 'transaksi'])->name('wisata.transaksi');

// QR
Route::get('/qr', [QRController::class, 'detail'])->name('qr.home')->middleware('auth');

// Dashboard
Route::get('/dashboard', [WisataController::class, 'dashboard'])->name('wisata.dashboard')->middleware('auth');

Route::get('/dashboard/wisata', [WisataController::class, 'index'])->name('dashboard.wisata')->middleware('auth');
Route::get('/dashboard/wisata/add', [WisataController::class, 'create'])->name('dashboard.wisata_add')->middleware('auth');
Route::post('/dashboard/wisata/add', [WisataController::class, 'store'])->name('dashboard.wisata_post')->middleware('auth');
Route::get('/dashboard/wisata/update/{id}', [WisataController::class, 'edit'])->name('dashboard.wisata_update')->middleware('auth');
Route::put('/dashboard/wisata/update/{id}', [WisataController::class, 'update'])->name('dashboard.wisata_put')->middleware('auth');
Route::delete('/dashboard/wisata/delete/{id}', [WisataController::class, 'destroy'])->name('dashboard.wisata_delete')->middleware('auth');

Route::get('/dashboard/admin', [UserController::class, 'index'])->name('dashboard.admin')->middleware('auth');
Route::get('/dashboard/admin/add', [UserController::class, 'create'])->name('dashboard.admin_add')->middleware('auth');
Route::post('/dashboard/admin/add', [UserController::class, 'store'])->name('dashboard.admin_post')->middleware('auth');
Route::get('/dashboard/admin/update/{id}', [UserController::class, 'edit'])->name('dashboard.admin_update')->middleware('auth');
Route::put('/dashboard/admin/update/{id}', [UserController::class, 'update'])->name('dashboard.admin_put')->middleware('auth');
Route::delete('/dashboard/admin/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.admin_delete')->middleware('auth');

Route::get('/dashboard/wisata', [WisataController::class, 'dashboard_wisata'])->name('dashboard.wisata')->middleware('auth');
Route::get('/dashboard/wisata/add', [WisataController::class, 'create'])->name('dashboard.wisata_add')->middleware('auth');
Route::post('/dashboard/wisata/add', [WisataController::class, 'store'])->name('dashboard.wisata_post')->middleware('auth');
Route::get('/dashboard/wisata/update/{id}', [WisataController::class, 'edit'])->name('dashboard.wisata_update')->middleware('auth');
Route::put('/dashboard/wisata/update/{id}', [WisataController::class, 'update'])->name('dashboard.wisata_put')->middleware('auth');
Route::delete('/dashboard/wisata/delete/{id}', [WisataController::class, 'destroy'])->name('dashboard.wisata_delete')->middleware('auth');
