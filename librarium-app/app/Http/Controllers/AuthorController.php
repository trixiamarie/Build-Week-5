<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userauth = Auth::user();
        if ($userauth->role_id === 1) {
        $authors = Author::with('books.genres')->get();
        return view('listaautoriadmin', ['authors' => $authors]);
    }
    else{
        {
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
        $userauth = Auth::user();
        if ($userauth->role_id === 1) {
        return view('creaautoreadmin');
    }
    else{
        {
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
        $userauth = Auth::user();
        if ($userauth->role_id === 1) {
        $author->load('books.genres');
        return view('dettaglioautoreadmin', ['author' => $author->load('books')]);
    }
    else{
        {
            Auth::logout(); // Effettua il logout
            return redirect()->route('login'); // Reindirizza alla pagina di login
        }
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        $userauth = Auth::user();
        if ($userauth->role_id === 1) {
        return view('formeditautore', ['author' => $author]);
    }
    else{
        {
            Auth::logout(); // Effettua il logout
            return redirect()->route('login'); // Reindirizza alla pagina di login
        }
    }
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
        return redirect()->route('author.index')->with('message', 'Autore eliminato correttamente');
    }

    public function search(Request $request)
    {   
        try {
            $search = $request->input('search');
           
            $authors = Author::where('pseudonym', 'LIKE', "%{$search}%")
            ->orWhereHas('books', function($q) use ($search){
                $q->where('title', 'LIKE', "%{$search}%");
            })
            ->get()
            ->loadCount('books');
            return response()->json($authors);
        } catch (\Exception $e) {
            
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
