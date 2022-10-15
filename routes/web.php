<?php

use App\Http\Controllers\LaporanTransaksiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Transaksi;
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
    return view('frontend.home_index');
});

Route::get('/dashboard', function () {
    return view('admin.admin_index');
})->middleware(['auth', 'isAdmin'])->name('dashboard');

Route::get('/home', function () {
    return view('pages.pages_master');
})->middleware(['auth', 'isUser'])->name('home');

Route::resource('user', UserController::class)->middleware(['auth', 'isAdmin']);

Route::resource('produk', ProdukController::class)->middleware(['auth', 'isAdmin']);

Route::resource('transaksi', TransaksiController::class)->middleware(['auth', 'isAdmin']);
Route::get('/laporan/transaksi', [TransaksiController::class, 'laporan'])->middleware(['auth', 'isAdmin'])->name('laporan.index');

require __DIR__.'/auth.php';
