<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::with('books.genres')->get();
        return view('listaautoriadmin', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('creaautoreadmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|max:255',
            'lastname'=>'required|max:255',
            'pseudonym'=>'required|max:255',
            'birthday'=>'required|date',
            'city' => 'required|string',
            'bio' => 'required|string',
            'avatar'=>'required',
        ]);

        Author::create($data);
        return redirect()->route('author.show', ['author' => Author::latest()->first()->load('books')])->with('message', 'Autore creato correttamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $author->load('books.genres');
        return view('dettaglioautoreadmin', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('formeditautore', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $data=$request->validate([
            'name'=>'required|max:255',
            'lastname'=>'required|max:255',
            'pseudonym'=>'required|max:255',
            'birthday'=>'required|date',
            'city' => 'required|string',
            'bio' => 'required|string',
            'avatar'=>'required',
        ]);
        $author->update($data);
        return redirect()->route('author.show', ['author' => $author])->with('message', 'Autore modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('dashboard')->with('message', 'Autore eliminato correttamente');
    }
}
