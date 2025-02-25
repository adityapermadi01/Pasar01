<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Databarangcontroller;
use App\Http\Controllers\Pasaranyarcontroller;
use App\Http\Controllers\Pasarbanyuasricontroller;
use App\Http\Controllers\PengunjungController;
use App\Models\Pasarbanyuasri;
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

Route::get('/', [PengunjungController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/Halaman_Admin', [AdminController::class, 'index'])->middleware(['auth:sanctum', 'verified']);
    Route::resource('databarang', Databarangcontroller::class);
    Route::resource('pasarbanyuasri', Pasarbanyuasricontroller::class);
    Route::get('/get-code-barang', [Pasarbanyuasricontroller::class, 'getCode'])->name('getCodeBarang');
});
