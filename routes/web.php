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

    Route::get('/history-spp', [\App\Http\Controllers\HistorySppController::class, 'index'])->name('history-spp.index');

    Route::middleware('role:admin')->group(function () {
        Route::resources([
            '/spp' => \App\Http\Controllers\SppController::class,
            '/transaksi-spp' => \App\Http\Controllers\TransaksiSppController::class,
            '/siswa' => \App\Http\Controllers\SiswaController::class,
            '/kelas' => \App\Http\Controllers\KelasController::class,
            '/users' => \App\Http\Controllers\UserController::class,
            '/roles' => \App\Http\Controllers\RoleController::class,
        ]);

        Route::get('pelunasan-spp', [\App\Http\Controllers\TransaksiSppController::class, 'pelunasan'])->name('pelunasan-spp.index');
    });

    Route::get('/siswa-import', [\App\Http\Controllers\SiswaController::class, 'import'])->name('siswa.import');
    Route::post('/siswa-import', [\App\Http\Controllers\SiswaController::class, 'storeImport'])->name('siswa.storeImport');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('/spp', [\App\Http\Controllers\ApiController::class, 'getSpp'])->name('spp.list');
    Route::post('/spp/{nisn}', [\App\Http\Controllers\ApiController::class, 'storeSpp']);
});
