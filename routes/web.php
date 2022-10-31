<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JamController;
use App\Http\Controllers\Admin\LapanganController;
use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');

Route::get('/cara-booking', function () {
    return view('cara-booking');
})->name('cara-booking');

Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');

Route::get('/bayar/{token}', [PesananController::class, 'bayar'])->name('bayar');

Route::get('/jadwal/tgl', [JadwalController::class, 'data'])->name('tgl.jadwal');

Route::group(['middleware' => ['auth','level']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'jam'], function(){
        Route::get('/', [JamController::class, 'index'])->name('jam');
        Route::get('/data', [JamController::class, 'data'])->name('jam.data');
        Route::get('/tambah', [JamController::class, 'create'])->name('jam.tambah');
        Route::post('/store', [JamController::class, 'store'])->name('jam.simpan');
        Route::get('/ubah/{id}', [JamController::class, 'ubah'])->name('jam.ubah');
        Route::post('/ubah/simpan', [JamController::class, 'edit'])->name('jam.edit');
        Route::get('/hapus/{id}', [JamController::class, 'delete'])->name('jam.hapus');
    });

    Route::get('/lapangan', [LapanganController::class, 'index'])->name('lapangan');

    Route::get('/lapangan/tambah', [LapanganController::class, 'create'])->name('lapangan.tambah');

    Route::get('/pesanan', function() {
        return view('admin.pesanan');
    })->name('pesanan');

});

Route::get('/riwayat-pembayaran', function () {
    return view('riwayat-pembayaran');
})->name('riwayat-pembayaran');

Route::group(['middleware' => ['auth']], function(){
    Route::post('/pesan', [PesananController::class, 'store'])->name('pesan.store');
});

Auth::routes();

