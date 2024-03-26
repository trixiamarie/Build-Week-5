<style>
   .btn-custom {
       margin-top: 20px !important;
       background-color: white !important;
       color: #44b4b0 !important;
       transition: background-color 1s ease, color 1s ease !important;
       font-family: 'Silka', sans-serif !important;
   }

   .glass-effect-white {
    background-color: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(10px);
    border-radius: 1dvh;
    border: 1px solid rgba(255, 255, 255, 0.6);
    z-index: 1000;
}
   .btn-custom:hover {
       color: white !important;
       background-color: #44b4b0 !important;
   }
   .btn-customG {
    margin-top: 2dvh !important;
    background-color: #A9B2BB !important;
    color: white !important;
    transition: background-color 1s ease !important;
    tansition: color 1s ease !important;
    font-family: 'Silka', sans-serif !important;
}

.btn-customG:hover {
    color: white !important;
    background-color: #3d4145 !important;
}
</style>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifica Libro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('book.update', ['book' => $book]) }}" method="POST" class="w-full px-4 py-6">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="cover" class="block text-sm font-medium text-gray-700">Cover URL:</label>
                            <input type="text" id="cover" name="cover" value="{{ $book->cover }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="color" class="block text-sm font-medium text-gray-700">Colore:</label>
                            <input type="text" id="color" name="color" value="{{ $book->color }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Titolo:</label>
                            <input type="text" id="title" name="title" value="{{ $book->title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="released" class="block text-sm font-medium text-gray-700">Data di pubblicazione:</label>
                            <input type="date" id="released" name="released" value="{{ $book->released }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="publisher" class="block text-sm font-medium text-gray-700">Editore:</label>
                            <input type="text" id="publisher" name="publisher" value="{{ $book->publisher }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-2">
                            <label for="plot" class="block text-sm font-medium text-gray-700">Trama:</label>
                            <textarea id="plot" name="plot" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $book->plot }}</textarea>
                        </div>
                        <div>
                            <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN:</label>
                            <input type="text" id="isbn" name="isbn" value="{{ $book->isbn }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700">Autore:</label>
                            <select id="author" name="author" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @foreach($authors as $author)
                                <option value="{{ $author->id }}" @if($book->authors->id == $author->id) selected @endif>{{ $author->pseudonym }}, {{ $author->name }} {{ $author->lastname }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div>
                            <label for="genre" class="block text-sm font-medium text-gray-700">Genere:</label>
                            <select id="genre" name="genre" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="copies" class="block text-sm font-medium text-gray-700">Numero di copie:</label>
                            <input type="number" id="copies" name="copies" value="{{ $book->copies }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Categoria:</label>
                            <input type="text" id="category" name="category" value="All" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="btn btn-custom">
                            Salva Modifiche
                        </button>
                    </div>
                </form>




            </div>
        </div>
    </div>
</x-app-layout>