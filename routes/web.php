<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SimulasitransaksiController;
use App\Http\Controllers\CucianController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;



Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login/cek', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('catatan', CatatanController::class);

// simulasi transaksi (to)
    route::resource('transaksi',SimulasitransaksiController::class);
// absesnsi kerja (to)
    route::resource('absensi', AbsensiController::class);

    Route::get('/cucian', [CucianController::class, 'index']);
    Route::get('/penjualan', [PenjualanController::class, 'index']);
// laporan bug
    Route::resource('/laporan', LaporanController::class);

// export
route::get('export/laporan', [LaporanController::class, 'exportData'])
->name('export-laporan');

// import
route::post('laporan/import', [LaporanController::class, 'importData'])->name('import-laporan');
});
