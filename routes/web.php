<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
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
    Route::get('/AkunTransaksi', [HomeController::class, 'AkunTransaksi'])->name('AkunTransaksi');
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web', 'cekRole:user'], 'as' => 'user.'], function(){
    Route::get('/landingUser', [HomeController::class, 'landingUser'])->name('landingUser');
});