<?php

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
