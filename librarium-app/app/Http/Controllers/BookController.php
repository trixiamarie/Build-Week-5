<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userrole = Auth::user()->role_id;
        if ($userrole == 1) {

            $books = Book::with('authors', 'genres')->get();
            return view('listabooksadmin', ['books' => $books]);
        } else { {
                Auth::logout(); // Effettua il logout
                return redirect()->route('login'); // Reindirizza alla pagina di login
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userrole = Auth::user()->role_id;
        if ($userrole == 1) {
            $authors = Author::all();
            $genres = Genre::all();
            return view('creabookadmin', ['authors' => $authors, 'genres' => $genres]);
        } else { {
                Auth::logout(); // Effettua il logout
                return redirect()->route('login'); // Reindirizza alla pagina di login
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'cover' => 'required|string',
            'color' => 'required|string',
            'title' => 'required|string',
            'released' => 'required|date',
            'publisher' => 'required|string',
            'plot' => 'required|string',
            'isbn' => 'required|string|unique:books',
            'author' => 'required|exists:authors,id',
            'genre' => 'required|exists:genres,id',
            'copies' => 'required|integer',
            'category' => 'required|string',
        ]);
        $book = Book::create($data);
        return redirect()->route('book.show', ['book' => $book->id])->with('message', 'Libro creato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $userrole = Auth::user()->role_id;
        $book = $book->load('authors', 'genres', 'reviews.user');
        $sameAuthorBooks = Book::where('author', $book->authors->id)->get();
        $sameGenreBooks = Book::where('genre', $book->genres->id)->get();

        if ($userrole == 1) {
            return view('dettaglioadmin', compact('book', 'sameAuthorBooks', 'sameGenreBooks'));
        } else if ($userrole == 2) {
            return view('dettagliobook', compact('book', 'sameAuthorBooks', 'sameGenreBooks'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $userrole = Auth::user()->role_id;
        if ($userrole == 1) {
            $authors = Author::all();
            $genres = Genre::all();
            return view('formeditbook', ['book' => $book, 'authors' => $authors, 'genres' => $genres]);
        } else { {
                Auth::logout(); // Effettua il logout
                return redirect()->route('login'); // Reindirizza alla pagina di login
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'cover' => 'required|string',
            'color' => 'required|string',
            'title' => 'required|string',
            'released' => 'required|date',
            'publisher' => 'required|string',
            'plot' => 'required|string',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id,
            'author' => 'required|exists:authors,id',
            'genre' => 'required|exists:genres,id',
            'copies' => 'required|integer',
            'category' => 'required|string',
        ]);

        $book->update($validatedData);

        $books = Book::with('authors', 'genres')->get();

        return redirect()->route('book.show', ['book' => $book->id, 'books' => $books])->with('message', 'Libro aggiornato correttamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $userrole = Auth::user()->role_id;
        if ($userrole == 1) {
            $book->delete();
            return redirect()->route('book.index')->with('message', 'Libro eliminato correttamente');
        } else { {
                Auth::logout(); // Effettua il logout
                return redirect()->route('login'); // Reindirizza alla pagina di login
            }
        }
    }


    public function search(Request $request)
    {
        try {
            $search = $request->input('search');
           
            $books = Book::where('title', 'LIKE', "%{$search}%")
            ->orWhereHas('authors', function($q) use ($search){
                $q->where('pseudonym', 'LIKE', "%{$search}%");
            })
            ->orWhere('genre', 'LIKE', "%{$search}%")
            ->get()
            ->load('authors');
            // Ritorna i libri trovati come risposta JSON
            return response()->json($books);
        } catch (\Exception $e) {
            // Gestione delle eccezioni
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
