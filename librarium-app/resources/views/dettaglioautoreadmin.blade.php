<style>
    .btn-custom {

    background-color: #A9B2BB !important;
    color: white !important;
    transition: background-color 1s ease !important;
    tansition: color 1s ease !important;
    font-family: 'Silka', sans-serif !important;
}

.btn-custom:hover {
    color: white !important;
    background-color: #3d4145 !important;
}

.btn-customG {
    
    background-color: white !important;
    border: 1px solid #44A9A5 !important;
    color: #44A9A5 !important;
    transition: background-color 1s ease !important;
    tansition: color 1s ease !important;
    font-family: 'Silka', sans-serif !important;
}

.btn-customG:hover {
    color: white !important;
    background-color: #44A9A5 !important;
}
    .book-card {
        width: 15rem;
        border: 0.3rem solid #9DBDB6;
        margin: 0.5rem;
    }

    .book-card .card-img img {
        height: 15rem;
        width: 100%;
        object-fit: cover;
    }

    .book-card .card-body {
        padding: 1rem;
    }

    .book-card .card-title {
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
    }

    .book-card .card-text {
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$author->pseudonym}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <a href="{{ route('author.index') }}" class="me-2"><button class="btn btn-customG">Tutti gli autori</button></a>
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
                        <p class=""><strong>Data di nascita:</strong> {{date_create($author->birthday)->format('jS M Y')}}</p>
                        <p class=""><strong>Città:</strong> {{$author->city}}</p>
                        <p class=""><strong>Bio:</strong> {{$author->bio}}</p>
                        <p class=""><strong>N. libri nel database:</strong> {{$author->books->count()}}</p>
                        <div class="d-flex mt-4">
                            <a href="{{ route('author.edit', ['author' => $author]) }}" class=""><button class="btn btn-customG me-2">Modifica autore</button></a>
                            <form action="{{ route('author.destroy', ['author' => $author->id] ) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare?')" class="btn btn-custom">Elimina autore</button>
                            </form>
                        </div>
                    </div>


                </div>
                <div>
                    <a href="{{ route('book.create', ['author' => $author]) }}" class=""><button class="btn btn-customG">Aggiungi libro</button></a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200 d-flex flex-wrap">
                    @if(isset($author->books))

                    @foreach($author->books as $book)
                    <a href="{{route('book.show', ['book'=>$book])}}">
                        <div class="book-card" style="width: 15rem; border: 0.3rem solid #9DBDB6; border-radius:0.3rem;">
                            <div class="card-img">
                                <img src="{{ $book->cover }}" alt="{{ $book->title }}">
                            </div>
                            <div class="card-body p-4">
                                <h5 class="card-title" style="font-size: 0.8em;">{{ $book->title }}</h5>
                                <p class="card-text">ISBN: {{ $book->isbn }}</p>
                                <p class="card-text">ID: {{ $book->id }}</p>
                            </div>
                        </div>
                    </a>

                    @endforeach

                    @else
                    <p class="p-0 m-4">Nessun libro presente</p>
                    @endif


                </div>
            </div>
        </div>
    </div>
</x-app-layout>