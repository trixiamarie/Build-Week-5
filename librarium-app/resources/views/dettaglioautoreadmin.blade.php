<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$author->pseudonym}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 d-flex">
                    <div class="me-5">
                        <div>
                            <p class="fw-bold fs-3">{{$author->pseudonym}}</p>
                        </div>
                        <div style="width: 10rem; height: 10rem; border-radius: 50%; overflow: hidden; border: 0.5rem solid #9DBDB6;" class="text-center">
                            <img src="{{$author->avatar}}" alt="Descrizione dell'immagine" style="width: 100%; height: 100%;">
                        </div>
                    </div>
                    <div>
                        <p class=""><strong>ID:</strong>{{$author->id}}</p>
                        <p class=""><strong>Nome:</strong>{{$author->name}}</p>
                        <p class=""><strong>Cognome:</strong> {{$author->lastname}}</p>
                        <p class=""><strong>Pseudonimo:</strong> {{$author->pseudonym}}</p>
                        <p class=""><strong>Data di nascita:</strong> {{$author->birthday}}</p>
                        <p class=""><strong>Città:</strong> {{$author->city}}</p>
                        <p class=""><strong>Bio:</strong> {{$author->bio}}</p>
                        <p class=""><strong>N. libri nel database:</strong> {{$author->books->count()}}</p>
                        <div class="d-flex mt-4">
                        <a href="{{ route('author.edit', ['author' => $author]) }}" class=""><button class="btn btn-outline-info me-2">Modifica autore</button></a>
                    <form action="{{ route('author.destroy', ['author' => $author->id] ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Elimina autore</button>
                    </form></div>
                    </div>


                </div>
                <div>
                    <a href="{{ route('book.create', ['author' => $author]) }}" class="bg-amber-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded"><button class="btn btn-outline-info">Aggiungi libro</button></a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 d-flex flex-wrap">
                    @if(isset($author->books))
                    
                        @foreach($author->books as $book)
                        <div style="width:15rem;border:0.3rem solid #9DBDB6;" class="m-2">
                        <div class="card" style="height:25rem; width:15rem;">
                            <img src="{{ $book->cover }}" style="height:100%;width:100%;">
                        </div>
                    <p class="p-0 m-4">{{ $book->title }}</p>
                    <p class="mx-4">ISBN: {{ $book->isbn }}</p>
                    <p class="mx-4">ID: {{ $book->id }}</p>
                    </div>
                        @endforeach
                    
                    @else
                    <p class="p-0 m-4">Nessun libro presente</p>
                    @endif


                </div>
            </div>
        </div>
    </div>
</x-app-layout>