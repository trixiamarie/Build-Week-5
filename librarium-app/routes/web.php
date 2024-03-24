<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
    $books = Book::all();
    return view('welcome')->with('books', $books);
});

Route::get('/', function () {
    $books = Book::all();
    return view('welcome')->with('books', $books);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user->role_id == 1) {
            // Load admin dashboard
            $books = Book::with('authors', 'genres')->paginate(10);
            return view('dashboardadmin', ['books' => $books]);
        } else if ($user->role_id == 2) {
            // Load user dashboard
            $books = Book::with('authors', 'genres')->paginate(10);
            return view('dashboard', ['books' => $books]);
        }
        abort(403, 'Unauthorized action.');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/booking/create/{book}', [BookingController::class, 'create'])->name('booking.create');
// Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
// Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
// Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');

// Route::resource('/author', AuthorController::class);


require __DIR__.'/auth.php';
