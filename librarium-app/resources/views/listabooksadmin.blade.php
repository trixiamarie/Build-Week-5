<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Libri') }}
        </h2>
        <div class="d-flex justify-content-end gap-3">
            <a class="btn btn-outline-info" href="{{route('book.create')}}">Crea Libro</a>
            <input type="text" class="d-block search form-control rounded" placeholder="Ricerca un autore o un libro" style="margin-left: 20px; width: 20%;">
        </div>
        </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class='searchResultsArea'>
                <h2 class="h2 cap "></h2>
                <div class="displayBooksArea bg-white overflow-hidden shadow-sm sm:rounded-lg"></div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg shownBooks">
                
                    
                    @foreach ($books as $book)
                    <div class="p-6 bg-white border-b border-gray-200 d-flex justify-content-between align-items-center" style="background-color: {{ $book['color'] }};">
                    <div class="bg-white  col-sm-2 align-middle d-flex justify-content-center ">
                        <img src="{{ $book['cover'] }}" alt="Cover" class="" style="height: 10rem;">
                    </div>

                    <div class="p-6 bg-white col-sm-4 ">
                        <p><strong>Titolo:</strong>: {{ $book['title'] }}</p>
                        <p><strong>Data di pubblicazione:</strong> {{ $book['released'] }}</p>
                        <p><strong>Editore:</strong> {{ $book['publisher'] }}</p>
                        <p><strong>ISBN:</strong> {{ $book['isbn'] }}</p>
                        <p><strong>Numero di copie disponibili:</strong> {{ $book['copies'] }}</p>

                    </div>

                    <div class="p-6 bg-white col-sm-4">
                        <p><strong>Trama:</strong> {{ $book['plot'] }}</p>
                    </div>

                    <div class="p-6 bg-white col-sm-2 d-flex flex-column align-items-center">
                        <a href="{{route('book.show', ['book' => $book])}}"><button class="btn btn-outline-info">Dettaglio</button></a>
                        <a href="{{route('book.edit', ['book'=>$book])}}"><button class="btn btn-outline-info mt-4 mb-4">Modifica</button></a>
                        <form action="{{route('book.destroy',['book'=>$book])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Cancella</button>
                        </form>
                    </div>
                    </div>
                    @endforeach
                
            </div>
        </div>
    </div>
</x-app-layout>