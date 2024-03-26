<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role_id === 2) {
            $userId = Auth::id();
            $myBookings = Booking::where('user', $userId)->with('books.authors')->orderBy('created_at', 'desc')->get();
            return view('imieibooking', ['bookings' => $myBookings]);
        } else if (Auth::user()->role_id === 1) {
            $bookings = Booking::with('users', 'books.authors')->orderBy('created_at', 'desc')->get();

            return view('listaprenotazioniadmin', ['bookings' => $bookings]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($book)
    {
        $user = Auth::id();
        $mybook = Book::with('authors')->find($book);

        return view('creaprenotazione', ['book' => $mybook, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'book' => 'required',
            'collectiondate' => 'required|date'
        ]);

        $returndate = Carbon::createFromFormat('Y-m-d', $request->collectiondate)->addDays(30);

        $booking = new Booking();
        $booking->user = $request->user;
        $booking->book = $request->book;
        $booking->collectiondate = $request->collectiondate;
        $booking->return = $returndate;

        $booking->save();

        $booking->books()->decrement('copies');


        return redirect()->action([BookingController::class, 'index'])->with('message', 'Prenotazione effettuata con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
{
    $validatedData = $request->validate([
        'state' => 'required|in:accettato,negato',
    ]);

    $booking->state = $validatedData['state'];
    $booking->save();

    if ($validatedData['state'] === 'negato') {
        $book = $booking->books;
            $book->increment('copies');
    
    }

    return back()->with('success', 'Stato del booking aggiornato con successo.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {

        $booking->delete();
        return redirect()->action([BookingController::class, 'index'])->with('message', 'Prenotazione eliminata con successo!');
    }
}
