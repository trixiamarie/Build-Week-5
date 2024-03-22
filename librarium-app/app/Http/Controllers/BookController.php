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
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $userrole = Auth::user()->role_id;
       

        if($userrole == 1){
            return view('dettaglioadmin',['book'=>$book]);
        } else if ($userrole == 2){
            return view('dettagliobook',['book'=>$book]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
       return view('formeditbook',['book'=> $book, 'authors' => $authors, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'cover' => 'required|string',
            'title' => 'required|string',
            'released' => 'required|date',
            'publisher' => 'required|string',
            'plot' => 'required|string',
            'isbn' => 'required|string|unique:books,isbn',
            'author' => 'required|exists:authors,id',
            'genre' => 'required|exists:genres,id',
            'copies' => 'required|integer',
            'category' => 'required|string',
        ]);
    
        $bookUPDATE = Book::update($validatedData);

        $books = Book::with('authors','genres')->get();
    
        return view('dashboardadmin', ['books' => $books]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
