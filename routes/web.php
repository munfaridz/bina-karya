<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

// Halaman Utama
Route::get('/', [FrontendController::class, 'index'])->name('home');

<<<<<<< HEAD

// Kirim Saran
Route::post('/saran', [FrontendController::class, 'kirimSaran'])->name('saran.kirim');
Route::get('/struktur-organisasi', [FrontendController::class, 'struktur'])->name('struktur');

=======
// API Kas (untuk update real-time di frontend via AJAX)
Route::get('/api/kas-statistik', [FrontendController::class, 'apiKasStatistik'])->name('api.kas');

// Kirim Saran
Route::post('/saran', [FrontendController::class, 'kirimSaran'])->name('saran.kirim');
>>>>>>> e326b0ef4e7abd0261adf1ce23e56900fcc42545

// Lapak
Route::get('/lapak', [FrontendController::class, 'lapak'])->name('lapak');
Route::get('/lapak/produk/{produk}', [FrontendController::class, 'detailProduk'])->name('lapak.detail');