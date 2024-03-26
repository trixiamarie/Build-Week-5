<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('/author', AuthorController::class);

    Route::resource('/book', BookController::class);



    Route::get('/booking/create/{book}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
    Route::patch('/booking/{booking}', [BookingController::class, 'update'])->name('booking.update');

    Route::resource('/user', UserController::class);

    Route::resource('/genre', GenreController::class);

    Route::resource('/review', ReviewController::class);
    Route::post('books/{book}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

});



Route::get('/search', [BookController::class, 'search'])->name('search');

