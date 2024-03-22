<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{route('book.store')}}" method="POST">
        @csrf
        

        <label for="cover">Cover Image URL:</label><br>
        <input type="text" id="cover" name="cover" value="{{$book->cover}}"><br>
        
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{$book->title}}"><br>
        
        <label for="released">Released Date:</label><br>
        <input type="date" id="released" name="released" value="{{$book->released}}"><br>
        
        <label for="publisher">Publisher:</label><br>
        <input type="text" id="publisher" name="publisher" value="{{$book->publisher}}"><br>
        
        <label for="plot">Plot Summary:</label><br>
        <textarea id="plot" name="plot" rows="4" cols="50">{{$book->plot}}</textarea><br>
        
        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" value="{{$book->isbn}}"><br>
        
        <label for="author">Author:</label><br>
        <select id="author" name="author">
            @foreach($authors as $author)
            <option value="{{$author->id}}">{{$author->pseudonym}}, {{$author->name}} {{$author->lastname}}</option>  
            @endforeach
        </select><br>
        
        <label for="genre">Genre:</label><br>
        <select id="genre" name="genre">
            @foreach($genres as $genre)
            <option value="{{$genre->id}}">{{$genre -> name}}</option>
            @endforeach
        </select><br>
        
        <label for="copies">Number of Copies:</label><br>
        <input type="number" id="copies" name="copies" value="{{$book->copies}}"><br>
        
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" value="All"><br>
        
        <button type="submit" class="btn btn-outline-success">SALVA</button>
    </form>
                
              
            </div>
        </div>
    </div>
</x-app-layout>