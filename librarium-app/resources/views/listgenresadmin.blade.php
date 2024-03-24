<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generi') }}
        </h2>
        <a href="{{route('genre.create')}}"><button type="button" class="btn btn-outline-info">Crea Genere</button"></a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($genres as $genre)
                    <p class="p-6 bg-white border-b border-gray-200">{{$genre}}</p>
                    <a href="{{route('genre.show', ['genre' => $genre])}}"><button class="btn btn-outline-info">Dettaglio</button></a>
                    <a href="{{route('genre.edit', ['genre'=>$genre])}}"><button class="btn btn-outline-info">Modifica</button></a>
                    <form action="{{route('genre.destroy',['genre'=>$genre])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Cancella</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>