<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AkunTransaksiController;
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
    Route::get('/ValidasiTransaksi', [AkunTransaksiController::class, 'ValidasiTransaksi'])->name('ValidasiTransaksi');
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web', 'cekRole:user'], 'as' => 'user.'], function(){
    Route::get('/landingUser', [HomeController::class, 'landingUser'])->name('landingUser');
});