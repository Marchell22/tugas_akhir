<?php

use App\Http\Controllers\AkunPenggunaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AkunTransaksiController;
use App\Http\Controllers\BukuBesarController;
use App\Http\Controllers\JurnalPenutupController;
use App\Http\Controllers\JurnalPenyesuaianController;
use App\Http\Controllers\NeracaLajurController;
use App\Http\Controllers\JurnalUmumController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RencanaAnggaranBiayaController;
use App\Models\AkunTransaksi;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/login-proses',[loginController::class,'login_proses'])->name('login-proses');
Route::get('/logout',[loginController::class,'logout'])->name('logout');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web', 'cekRole:admin'], 'as' => 'admin.'], function(){
    Route::get('/AkunTransaksi', [AkunTransaksiController::class, 'AkunTransaksi'])->name('AkunTransaksi');
    Route::post('/AkunTransaksi/store', [AkunTransaksiController::class, 'store'])->name('AkunTransaksistore');
    Route::put('/AkunTransaksi/update/{id}', [AkunTransaksiController::class, 'update'])->name('AkunTransaksiupdate');
    Route::get('/ValidasiTransaksi', [AkunTransaksiController::class, 'ValidasiTransaksi'])->name('ValidasiTransaksi');
    Route::put('/ValidasiTransaksi/status/{id}', [AkunTransaksiController::class, 'updateStatus'])->name('ValidasiTransaksiStatus');
    Route::get('/JurnalUmum', [JurnalUmumController::class, 'JurnalUmum'])->name('JurnalUmum');
    Route::get('/JurnalUmumFilter', [JurnalUmumController::class, 'JurnalUmumFilter'])->name('JurnalUmumFilter');
    Route::post('/JurnalUmum/store', [JurnalUmumController::class, 'store'])->name('JurnalUmumstore');
    Route::put('/JurnalUmum/update/{id}', [JurnalUmumController::class, 'update'])->name('JurnalUmumupdate');
    Route::get('/ValidasiJurnalUmum', [JurnalUmumController::class, 'ValidasiJurnalUmum'])->name('ValidasiJurnalUmum');
    Route::put('/ValidasiJurnalUmum/status/{id}', [JurnalUmumController::class, 'updateStatus'])->name('ValidasiJurnalUmumStatus');
    Route::get('/JurnalPenyesuaian', [JurnalPenyesuaianController::class, 'JurnalPenyesuaian'])->name('JurnalPenyesuaian');
    Route::get('/JurnalPenyesuaianFilter', [JurnalPenyesuaianController::class, 'JurnalPenyesuaianFilter'])->name('JurnalPenyesuaianFilter');
    Route::post('/JurnalPenyesuaian/store', [JurnalPenyesuaianController::class, 'store'])->name('JurnalPenyesuaianstore');
    Route::put('/JurnalPenyesuaian/update/{id}', [JurnalPenyesuaianController::class, 'update'])->name('JurnalPenyesuaianupdate');
    Route::get('/ValidasiJurnalPenyesuaian', [JurnalPenyesuaianController::class, 'ValidasiJurnalPenyesuaian'])->name('ValidasiJurnalPenyesuaian');
    Route::get('/BukuBesar', [BukuBesarController::class, 'BukuBesar'])->name('BukuBesar');
    Route::get('/NeracaLajur', [NeracaLajurController::class, 'NeracaLajur'])->name('NeracaLajur');
    Route::get('/Ekuitas', [LaporanController::class, 'Ekuitas'])->name('Ekuitas');
    Route::get('/LabaRugi', [LaporanController::class, 'LabaRugi'])->name('LabaRugi');
    Route::get('/PosisiKeuangan', [LaporanController::class, 'PosisiKeuangan'])->name('PosisiKeuangan');
    Route::get('/JurnalPenutup', [JurnalPenutupController::class, 'JurnalPenutup'])->name('JurnalPenutup');
    Route::get('/AkunPengguna', [AkunPenggunaController::class, 'AkunPengguna'])->name('AkunPengguna');
    Route::post('/AkunPengguna/store', [AkunPenggunaController::class, 'store'])->name('AkunPenggunastore');
    Route::delete('/AkunPengguna/delete/{id}', [AkunPenggunaController::class, 'delete'])->name('AkunPenggunadelete');
    Route::put('/AkunPengguna/update/{id}', [AkunPenggunaController::class, 'update'])->name('AkunPenggunaupdate');
    Route::get('/RencanaAnggaranBiaya', [RencanaAnggaranBiayaController::class, 'RencanaAnggaranBiaya'])->name('RencanaAnggaranBiaya');
});
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'web', 'cekRole:user'], 'as' => 'user.'], function(){
    Route::get('/AkunTransaksi', [AkunTransaksiController::class, 'userAkunTransaksi'])->name('AkunTransaksi');
    Route::post('/AkunTransaksi/store', [AkunTransaksiController::class, 'userStore'])->name('AkunTransaksistore');
    Route::get('/JurnalUmum', [JurnalUmumController::class, 'userJurnalUmum'])->name('JurnalUmum');
    Route::post('/JurnalUmum/store', [JurnalUmumController::class, 'userStore'])->name('JurnalUmumstore');
    Route::get('/JurnalPenyesuaian', [JurnalPenyesuaianController::class, 'userJurnalPenyesuaian'])->name('JurnalPenyesuaian');
});