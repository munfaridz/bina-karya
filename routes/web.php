<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

// Halaman Utama
Route::get('/', [FrontendController::class, 'index'])->name('home');

// API Kas (untuk update real-time di frontend via AJAX)
Route::get('/api/kas-statistik', [FrontendController::class, 'apiKasStatistik'])->name('api.kas');

// Kirim Saran
Route::post('/saran', [FrontendController::class, 'kirimSaran'])->name('saran.kirim');

// Lapak
Route::get('/lapak', [FrontendController::class, 'lapak'])->name('lapak');
Route::get('/lapak/produk/{produk}', [FrontendController::class, 'detailProduk'])->name('lapak.detail');