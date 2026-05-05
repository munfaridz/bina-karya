<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

// Halaman Utama
Route::get('/', [FrontendController::class, 'index'])->name('home');


// Kirim Saran
Route::post('/saran', [FrontendController::class, 'kirimSaran'])->name('saran.kirim');
Route::get('/struktur-organisasi', [FrontendController::class, 'struktur'])->name('struktur');


// Lapak
Route::get('/lapak', [FrontendController::class, 'lapak'])->name('lapak');
Route::get('/lapak/produk/{produk}', [FrontendController::class, 'detailProduk'])->name('lapak.detail');