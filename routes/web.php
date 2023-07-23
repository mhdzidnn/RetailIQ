<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\BarangkeluarController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\InventoryController;



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

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

/*----------------------------------------------
Authentication
----------------------------------------------*/
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('store-register');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*----------------------------------------------
Barang masuk keluar
----------------------------------------------*/
Route::middleware(['auth'])->group(function () {
    // Routing untuk fitur barang masuk
    Route::prefix('barangmasuk')->group(function () {
        Route::get('/', [BarangmasukController::class, 'index'])->name('barangmasuk');
        Route::get('/create-masuk', [BarangmasukController::class, 'create'])->name('create');
        Route::post('/store-masuk', [BarangmasukController::class, 'store'])->name('store');
        Route::get('/edit-masuk/{id}', [BarangmasukController::class, 'edit'])->name('edit');
        Route::post('/update-masuk/{id}', [BarangmasukController::class, 'update'])->name('update');
        Route::get('/delete-masuk/{id}', [BarangmasukController::class, 'destroy'])->name('delete');
    });

    // Routing untuk fitur barang keluar
    Route::prefix('barangkeluar')->group(function () {
        Route::get('/', [BarangkeluarController::class, 'index'])->name('barangkeluar');
        Route::get('/create-keluar', [BarangkeluarController::class, 'create'])->name('create-keluar');
        Route::post('/store-keluar', [BarangkeluarController::class, 'store'])->name('store-keluar');
        Route::get('/edit-keluar/{id}', [BarangkeluarController::class, 'edit'])->name('edit-keluar');
        Route::post('/update-keluar/{id}', [BarangkeluarController::class, 'update'])->name('update-keluar');
        Route::post('/show-keluar/{id}', [BarangkeluarController::class, 'show'])->name('show-keluar');
        Route::get('/delete-keluar/{id}', [BarangkeluarController::class, 'destroy'])->name('delete-keluar');
    });
});

/*----------------------------------------------
Finance
----------------------------------------------*/
Route::middleware(['auth'])->group(function () {
    Route::get('/finance', [FinanceController::class, 'index'])->middleware('auth')->name('finance');
});

// Routing untuk fitur inventory
Route::middleware(['auth'])->group(function () {
    Route::prefix('inventory')->group(function () {
        Route::get('/', [InventoryController::class, 'index'])->name('inventory');
        Route::delete('/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
        // Tambahkan route lainnya sesuai kebutuhan Anda
    });
});

/*----------------------------------------------
Contact Us
----------------------------------------------*/
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::post('/contact-us/store', [ContactUsController::class, 'store'])->name('store-contact-us');
Route::get('/barangkeluar/{id}', [BarangkeluarController::class, 'show'])->name('show-keluar');


// routes/web.php


Route::post('/barangkeluar/{id}/upload', 'BarangkeluarController@uploadFile')->name('barangkeluar.uploadFile');
Route::get('/barangkeluar/{id}/download', 'BarangkeluarController@downloadFile')->name('barangkeluar.downloadFile');


Route::get('exportExcel', [BarangkeluarController::class, 'exportExcel'])->name('barangkeluar.exportExcel');

Route::get('exportPdf', [BarangkeluarController::class, 'exportPdf'])->name('barangkeluar.exportPdf');