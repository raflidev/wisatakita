<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QRController;
use App\Http\Controllers\TransaksiController;
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
Route::post('/detail', [TransaksiController::class, 'store'])->name('wisata.transaksi');
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
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

// QR
Route::get('/qr', [QRController::class, 'detail'])->name('qr.home')->middleware('auth');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::prefix('dashboard')->group(function () {
    Route::get('/wisata', [DashboardController::class, 'wisata'])->name('dashboard.wisata')->middleware('auth');
    Route::get('/wisata/add', [WisataController::class, 'create'])->name('dashboard.wisata_add')->middleware('auth');
    Route::post('/wisata/add', [WisataController::class, 'store'])->name('dashboard.wisata_post')->middleware('auth');
    Route::get('/wisata/update/{id}', [WisataController::class, 'edit'])->name('dashboard.wisata_update')->middleware('auth');
    Route::put('/wisata/update/{id}', [WisataController::class, 'update'])->name('dashboard.wisata_put')->middleware('auth');
    Route::delete('/wisata/delete/{id}', [WisataController::class, 'destroy'])->name('dashboard.wisata_delete')->middleware('auth');

    Route::get('/admin', [UserController::class, 'index'])->name('dashboard.admin')->middleware('auth');
    Route::get('/admin/add', [UserController::class, 'create'])->name('dashboard.admin_add')->middleware('auth');
    Route::post('/admin/add', [UserController::class, 'store'])->name('dashboard.admin_post')->middleware('auth');
    Route::get('/admin/update/{id}', [UserController::class, 'edit'])->name('dashboard.admin_update')->middleware('auth');
    Route::put('/admin/update/{id}', [UserController::class, 'update'])->name('dashboard.admin_put')->middleware('auth');
    Route::delete('/admin/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.admin_delete')->middleware('auth');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('dashboard.transaksi')->middleware('auth');

    // Route::get('/wisata', [DashboardController::class, 'wisata'])->name('dashboard.wisata')->middleware('auth');
    // Route::get('/wisata/add', [WisataController::class, 'create'])->name('dashboard.wisata_add')->middleware('auth');
    // Route::post('/wisata/add', [WisataController::class, 'store'])->name('dashboard.wisata_post')->middleware('auth');
    // Route::get('/wisata/update/{id}', [WisataController::class, 'edit'])->name('dashboard.wisata_update')->middleware('auth');
    // Route::put('/wisata/update/{id}', [WisataController::class, 'update'])->name('dashboard.wisata_put')->middleware('auth');
    // Route::delete('/wisata/delete/{id}', [WisataController::class, 'destroy'])->name('dashboard.wisata_delete')->middleware('auth');

    Route::get('/user', [UserController::class, 'dashboard_user'])->name('dashboard.user')->middleware('auth');
    Route::get('/user/add', [UserController::class, 'create'])->name('dashboard.user_add')->middleware('auth');
    Route::post('/user/add', [UserController::class, 'store'])->name('dashboard.user_post')->middleware('auth');
    Route::get('/user/update/{id}', [UserController::class, 'edit'])->name('dashboard.user_update')->middleware('auth');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('dashboard.user_put')->middleware('auth');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.user_delete')->middleware('auth');
});
