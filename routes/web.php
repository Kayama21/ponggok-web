<?php

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

// Route isi form ajuan
Route::get('/', [App\Http\Controllers\SuratController::class, 'formRequests']);
Route::post('/createSurat', [App\Http\Controllers\SuratController::class, 'store']);

// Route Login
Route::get('/cpanel', [App\Http\Controllers\LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/cpanel/login', [App\Http\Controllers\LoginController::class, 'authenticate']);

Route::middleware(['auth'])
    ->group(function () {

        Route::get('/dashboard', [App\Http\Controllers\SuratController::class, 'index']);
        Route::get('/ajuan', [App\Http\Controllers\SuratController::class, 'listAjuan']);
        Route::get('/ajuan-table', [App\Http\Controllers\SuratController::class, 'tableAjuan']);

        Route::get('/riwayat', [App\Http\Controllers\SuratController::class, 'riwayat']);

        Route::middleware(['role:admin'])->group(function () {
            Route::get('/ajuan/verifikasi/{id}', [App\Http\Controllers\SuratController::class, 'verifikasi']);
            Route::post('/ajuan/verified-ajuan', [App\Http\Controllers\SuratController::class, 'verifiedAjuan']);
            Route::get('/ajuan/kirim-email/{id}', [App\Http\Controllers\SuratController::class, 'sendEmail']);

            Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index']);
            Route::get('/kategori/page-add', [App\Http\Controllers\KategoriController::class, 'addKategori']);
            Route::get('/kategori/page-update/{id}', [App\Http\Controllers\KategoriController::class, 'updateKategori']);
            Route::post('/kategori/store', [App\Http\Controllers\KategoriController::class, 'store']);
            Route::put('/kategori/update/{id}', [App\Http\Controllers\KategoriController::class, 'update']);
            Route::delete('/kategori/destroy/{id}', [App\Http\Controllers\KategoriController::class, 'destroy']);
        });

        Route::middleware(['role:lurah'])->group(function () {
            Route::get('/ajuan/signature/{id}', [App\Http\Controllers\SuratController::class, 'signaturePage']);
            Route::post('/ajuan/signed-ajuan', [App\Http\Controllers\SuratController::class, 'signedAjuan']);
            Route::get('/show-pdf/{id}', [App\Http\Controllers\SuratController::class, 'showSignedPDF']);
        });

        Route::get('/cpanel/logout', [App\Http\Controllers\LoginController::class, 'logout']);
    });
