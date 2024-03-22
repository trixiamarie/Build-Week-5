<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                    {{ __("Dettaglio Autore") }}
                    <div>
                        <a href="{{ route('author.edit', ['author' => $author]) }}" class="bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded">Modifica autore</a>
                        <form action="{{ route('author.destroy', ['author' => $author->id] ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Elimina autore</button>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{ $author}}</p>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(isset($books))
                        <ul>
                            @foreach($books as $book)
                                <li>{{ $book }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Nessun libro presente</p>
                    @endif
                   
                    <a href="{{ route('book.create', ['author' => $author]) }}" class="bg-amber-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Aggiungi libro</a>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>