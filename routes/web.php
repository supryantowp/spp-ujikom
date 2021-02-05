<?php

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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/transaksi-spp', \App\Http\Controllers\TransaksiSpp::class);
    Route::get('/history-spp', [\App\Http\Controllers\HistorySppController::class, 'index'])->name('history-spp.index');

    Route::resource('/siswa', \App\Http\Controllers\SiswaController::class);
    Route::resource('/kelas', \App\Http\Controllers\KelasController::class);

});

Route::group(['prefix' => 'api'], function () {
    Route::get('/spp', [\App\Http\Controllers\ApiController::class, 'getSpp'])->name('spp.list');
    Route::post('/spp/{nisn}', [\App\Http\Controllers\ApiController::class, 'storeSpp']);
});
