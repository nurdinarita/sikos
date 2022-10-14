<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManagementKosController;
use App\Http\Controllers\Admin\PenghuniKosController;
use App\Http\Controllers\Admin\RiwayatPembayaranController;
use App\Http\Controllers\Admin\ProfilController;

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


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [IndexController::class, 'index']);
Route::get('/{id}/detail', [IndexController::class, 'show']);
Route::get('/all', [IndexController::class, 'all']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::resource('/management-kos', ManagementKosController::class);
    Route::get('/management-kos/{id}/update', [ManagementKosController::class, 'updateStatus']);
    Route::resource('/profil', ProfilController::class);
    Route::get('/penghuni-kos', [PenghuniKosController::class, 'index']);
    Route::get('/penghuni-kos/{id}', [PenghuniKosController::class, 'detail']);
    Route::get('/penghuni-kos/{id}/create', [PenghuniKosController::class, 'create']);
    Route::post('/penghuni-kos/{id}/create', [PenghuniKosController::class, 'store']);
    Route::get('/penghuni-kos/{id}/edit', [PenghuniKosController::class, 'edit']);
    Route::post('/penghuni-kos/{id}/update', [PenghuniKosController::class, 'update']);
    Route::delete('/penghuni-kos/{id}/delete', [PenghuniKosController::class, 'destroy']);
    
    Route::get('/riwayat-pembayaran', [RiwayatPembayaranController::class, 'index']);
    Route::post('/penghuni-kos/{id}/update-pembayaran', [RiwayatPembayaranController::class, 'updatePembayaran']);
});