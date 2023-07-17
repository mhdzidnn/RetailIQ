<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\BarangkeluarController;


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
Inventory
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
        Route::get('/delete-keluar/{id}', [BarangkeluarController::class, 'destroy'])->name('delete-keluar');
    });
});

/*----------------------------------------------
Incoming
----------------------------------------------*/
Route::middleware(['auth'])->group(function () {

});



/*----------------------------------------------
Contact Us
----------------------------------------------*/
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::post('/contact-us/store', [ContactUsController::class, 'store'])->name('store-contact-us');
