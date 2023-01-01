<?php

use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\FirstPartyController;
use App\Http\Controllers\KabupatenKotaController;
use App\Http\Controllers\KementrianController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsletterLogController;
use App\Http\Controllers\ProvinsiController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [Auth\AuthController::class, 'index'])->name('home');

    Route::get('/login', [Auth\AuthController::class, 'show'])->name('login.show');
    Route::post('/login', [Auth\AuthController::class, 'authenticate'])->name('login.auth');
});

Route::middleware('auth')->group(function () {

    Route::get('/home', [Auth\AuthController::class, 'home'])->name('home.auth');
    Route::get('/logout', [Auth\AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [Auth\AuthController::class, 'register'])->name('register');

    /**
     * Statistik
     */
    Route::get('/statistik', [AdminController::class, 'statistik'])->name('statistik');
    Route::get('/statistik/{param}', [AdminController::class, 'getStatistik'])->name('statistik.getStatistik');

    /**
     * Newsletter
     */
    Route::get('/newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
    Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
    Route::get('/newsletter/{newsletter}/edit', [NewsletterController::class, 'edit'])->name('newsletter.edit');
    Route::put('/newsletter/{id}/update', [NewsletterController::class, 'update'])->name('newsletter.update');
    Route::get('/newsletter/{id}', [NewsletterController::class, 'cetak'])->name('newsletter.cetak');
    Route::get('/newsletter/{id}/history/cetak', [NewsletterLogController::class, 'cetak'])->name('newsletter-history.cetak');
    Route::get('/newsletter/delete/{newsletter}', [NewsletterController::class, 'destroy'])->name('newsletter.delete');
    Route::get('/newsletter/{newsletter}/history', [NewsletterLogController::class, 'index'])->name('newsletter.history');
    Route::get('/first-party/{id}', [FirstPartyController::class, 'selectedFirstParty'])->name('first-party');
    Route::get('/kementrian', [KementrianController::class, 'selectedKementrian'])->name('kementrian');
    Route::get('/provinsi ', [ProvinsiController::class, 'selectedProvinsi'])->name('provinsi');
    Route::get('/kabupaten-kota/{provinsi}', [KabupatenKotaController::class, 'selectedKabupatenKota'])->name('kabupaten-kota');

    /**
     * Storage
     */
    Route::get('/storage', [NewsletterController::class, 'show'])->name('storage');

    /**
     * History
     */
    Route::get('/newsletter/history/{newsletter:id}', [NewsletterLogController::class, 'index'])->name('newsletter.history');
});
