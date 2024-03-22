<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $role = Auth::user()->role_id;
        $books = Book::with('authors','genres')->get();
        if ($role == 1) {
            return view('dashboardadmin', ['books' => $books]);
        } elseif ($role == 2) {
            return view('dashboard', ['books' => $books]);
        } else {
            abort(403, 'Unauthorized.'); 
        }
    })->name('dashboard');
});

// Route::get('/dashboard', function () {
//     $books = Book::with('authors','genres')->get();
//     return view('dashboard', ['books' => $books]);
// })->middleware(['auth', 'role:2'])->name('dashboardutente');

// Route::get('/dashboardadmin', function () {
//     $books = Book::with('authors','genres')->get();
//     return view('dashboardadmin', ['books' => $books]);
// })->middleware(['auth', 'role:1'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
