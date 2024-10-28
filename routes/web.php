<?php

use App\Http\Controllers\AkunTransaksiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunPenggunaController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BukuBesarController;
use App\Http\Controllers\JurnalPenutupController;
use App\Http\Controllers\JurnalPenyesuaianController;
use App\Http\Controllers\NeracaLajurController;
use App\Http\Controllers\JurnalUmumController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RencanaAnggaranBiayaController;
use App\Models\RencanaAnggaranBiaya;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login-proses', [AuthenticatedSessionController::class, 'store'])->name('login-proses');;
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
Route::put('password', [PasswordController::class, 'update'])->name('password.update');
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
    Route::get('/download-pdf/{id}', [PdfController::class, 'downloadRAB'])->name('downloadRAB');
    Route::get('/downloadbukubesar-pdf', [PdfController::class, 'downloadBukuBesar'])->name('downloadBukuBesar');
    Route::get('/downloadneraca-pdf', [PdfController::class, 'downloadNeraca'])->name('downloadNeraca');
    Route::get('/downloadekuitas-pdf', [PdfController::class, 'downloadekuitas'])->name('downloadEkuitas');
    Route::get('/downloadeLabaRugi-pdf', [PdfController::class, 'downloadLabaRugi'])->name('downloadLabaRugi');
    Route::get('/downloadPosisiKeuangan-pdf', [PdfController::class, 'downloadPosisiKeuangan'])->name('downloadPosisiKeuangan');
    Route::get('/downloadJurnalPenutup-pdf', [PdfController::class, 'downloadJurnalPenutup'])->name('downloadJurnalPenutup');
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

require __DIR__ . '/auth.php';
