<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\confirm;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userrole = Auth::user()->role_id;

        if ($userrole === 1) {
            $reviews = Review::with('user', 'book')->orderBy('created_at', 'desc')->get();
            return view('listarecensioniadmin', ['reviews' => $reviews]);
        } else {
            $userId = Auth::user()->id;
            $reviews = Review::with('user', 'book.authors')->where('user_id', $userId)->get();
            return view('listarecensioni', ['reviews' => $reviews]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $book)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'review' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    $review = new Review();
    $review->user_id = auth()->id(); 
    $review->book_id = $book; 
    $review->title = $validatedData['title'];
    $review->review = $validatedData['review'];
    $review->rating = $validatedData['rating'];

    
    $review->save();

    
    return redirect()->route('book.show', ['book' => $book])->with('success', 'Recensione creata con successo!');
}


    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'book_id' => 'required|exists:books,id',
        ]);

        $review->title = $validatedData['title'];
        $review->review = $validatedData['review'];
        $review->rating = $validatedData['rating'];
        $review->book_id = $validatedData['book_id'];

        $review->save();

        // return redirect()->route('reviews.index')->with('success', 'Recensione aggiornata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Review $review)
    {
    if ($request->source === 'form1') {
        $bookId = $request->bookid;
        $review->delete();
        return redirect()->route('book.show', ['book' => $bookId])->with('success', 'Recensione eliminata con successo!');
    }else if($request->source === 'formadmin'){
        $review->delete();
        return redirect()->route('review.index')->with('success', 'Recensione eliminata con successo!');
    }
    $review->delete();
    return redirect()->route('review.index');
    }
}
