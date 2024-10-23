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
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RencanaAnggaranBiayaController;
use App\Models\RencanaAnggaranBiaya;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login-proses', [loginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web', 'cekRole:admin'], 'as' => 'admin.'], function () {
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
    Route::get('/ValidasiJurnalUmumFilter', [JurnalUmumController::class, 'ValidasiJurnalUmumFilter'])->name('ValidasiJurnalUmumFilter');
    Route::put('/ValidasiJurnalUmum/status/{id}', [JurnalUmumController::class, 'updateStatus'])->name('ValidasiJurnalUmumStatus');
    Route::get('/JurnalPenyesuaian', [JurnalPenyesuaianController::class, 'JurnalPenyesuaian'])->name('JurnalPenyesuaian');
    Route::get('/JurnalPenyesuaianFilter', [JurnalPenyesuaianController::class, 'JurnalPenyesuaianFilter'])->name('JurnalPenyesuaianFilter');
    Route::post('/JurnalPenyesuaian/store', [JurnalPenyesuaianController::class, 'store'])->name('JurnalPenyesuaianstore');
    Route::put('/JurnalPenyesuaian/update/{id}', [JurnalPenyesuaianController::class, 'update'])->name('JurnalPenyesuaianupdate');
    Route::get('/ValidasiJurnalPenyesuaian', [JurnalPenyesuaianController::class, 'ValidasiJurnalPenyesuaian'])->name('ValidasiJurnalPenyesuaian');
    Route::get('/ValidasiJurnalPenyesuaianFilter', [JurnalPenyesuaianController::class, 'ValidasiJurnalPenyesuaianFilter'])->name('ValidasiJurnalPenyesuaianFilter');
    Route::put('/ValidasiJurnalPenyesuaian/status/{id}', [JurnalPenyesuaianController::class, 'updateStatus'])->name('ValidasiJurnalPenyesuaianStatus');
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
    Route::post('/RencanaAnggaranBiaya/Store', [RencanaAnggaranBiayaController::class, 'store'])->name('RencanaAnggaranBiayastore');
    Route::get('/TambahRAB', [RencanaAnggaranBiayaController::class, 'TambahRAB'])->name('TambahRAB');
    Route::get('/EditRAB/Edit/{id}', [RencanaAnggaranBiayaController::class, 'edit'])->name('EditRAB');
    Route::put('/UpdateRAB/update/{id}', [RencanaAnggaranBiayaController::class, 'update'])->name('UpdateRAB');
    Route::delete('/DeleteRAB/{id}', [RencanaAnggaranBiayaController::class, 'delete'])->name('DeleteRAB');
    Route::get('/RencanaAnggaranBiaya/LaporanRAB/{id}', [RencanaAnggaranBiayaController::class, 'LaporanRAB'])->name('LaporanRAB');
    Route::get('/download-pdf/{id}', [PdfController::class, 'downloadRAB'])->name('downloadRAB');;

});
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'web', 'cekRole:user'], 'as' => 'user.'], function () {
    Route::get('/AkunTransaksi', [AkunTransaksiController::class, 'userAkunTransaksi'])->name('AkunTransaksi');
    Route::post('/AkunTransaksi/store', [AkunTransaksiController::class, 'userStore'])->name('AkunTransaksistore');
    Route::get('/JurnalUmum', [JurnalUmumController::class, 'userJurnalUmum'])->name('JurnalUmum');
    Route::get('/JurnalUmumFilter', [JurnalUmumController::class, 'userJurnalUmumFilter'])->name('JurnalUmumFilter');
    Route::post('/JurnalUmum/store', [JurnalUmumController::class, 'userStore'])->name('JurnalUmumstore');
    Route::get('/JurnalPenyesuaian', [JurnalPenyesuaianController::class, 'userJurnalPenyesuaian'])->name('JurnalPenyesuaian');
    Route::get('/JurnalPenyesuaianFilter', [JurnalPenyesuaianController::class, 'userJurnalPenyesuaianFilter'])->name('JurnalPenyesuaianFilter');
    Route::post('/JurnalPenyesuaian/store', [JurnalPenyesuaianController::class, 'userStore'])->name('JurnalPenyesuaianstore');
});
