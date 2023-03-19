<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SimulasitransaksiController;
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
});
