

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>

            <ul class="list-group">
                @foreach($books as $key=>$book)
                <li class="list-group-item">
                    <p>Titolo: {{$book -> title}}</p>
                    <p>Pseudonimo: {{ $book->authors->pseudonym }}</p>
                    <p>Genere: {{ $book->genres->name }}</p>
                    <a href="{{route('book.show',$book->id)}}"><button type="button" class="btn btn-outline-info">Info</button></a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>