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
Route::post('/login', [UserController::class, 'login'])->name('user.proseslogin');
// Register
Route::get('/daftar', [UserController::class, 'daftar'])->name('user.daftar');
Route::post('/daftar', [UserController::class, 'store'])->name('user.prosesdaftar');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

// Pembayaran Transaksi
Route::post('/transaksi', [WisataController::class, 'transaksi'])->name('wisata.transaksi');

// QR
Route::get('/qr', [QRController::class, 'detail'])->name('qr.home')->middleware('auth');
