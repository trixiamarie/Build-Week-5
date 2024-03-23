<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Libri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($books as $book)
                    <p class="p-6 bg-white border-b border-gray-200">{{$book}}</p>
                    <a href="{{route('book.show', ['book' => $book])}}"><button class="btn btn-outline-info">Dettaglio</button></a>
                    <a href="{{route('book.edit', ['book'=>$book])}}"><button class="btn btn-outline-info">Modifica</button></a>
                    <form action="{{route('book.destroy',['book'=>$book])}}" method="POST">
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