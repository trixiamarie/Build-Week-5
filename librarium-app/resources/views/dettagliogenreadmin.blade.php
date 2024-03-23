

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <p>{{$genre}}</p>

                <form>
                    
                </form>
                <div>
                        <a href="{{ route('genre.edit', ['genre' => $genre]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Modifica autore</a>
                        <form action="{{ route('genre.destroy', ['genre' => $genre->id] ) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Elimina</button>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>