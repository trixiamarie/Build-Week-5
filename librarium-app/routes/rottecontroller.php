<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::resource('/book', BookController::class);
// Route::resource('/booking', BookingController::class);
Route::get('/booking/create/{book}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');

Route::resource('/author', AuthorController::class);

// Route::get('/progetti/{id}', [ProgettoController::class, 'show'])->name('dettaglioprogetto');
// Route::post('/nuovoprogetto',[ProgettoController::class, 'store'])->name('salvaprogetto');
// Route::delete('/progetti/{progetto}', [ProgettoController::class, 'destroy'])->name('progetto.destroy');
// Route::get('/modificaprogetto/{progetto}',[ProgettoController::class, 'edit'])->name('modificaprogetto');
// Route::put('/progetti/{progetto}', [ProgettoController::class, 'update'])->name('progetto.update');