<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('listgenresadmin', ['genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('creagenereadmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:genres',
        ]);

        $genre = new Genre();
        $genre->name = $validatedData['name'];

        $genre->save();

        return redirect()->route('genre.index')->with('success', 'Genere creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view('dettagliogenreadmin',['genre' => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('editgenereadmin', ['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:genres,name,' . $genre->id,
        ]);
    
        $genre->name = $validatedData['name'];
        
        $genre->save();
    
        return redirect()->route('genre.index')->with('success', 'Genere aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect(route('genre.index'));
    }
}
