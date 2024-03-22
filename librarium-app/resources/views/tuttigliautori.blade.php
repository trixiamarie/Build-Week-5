

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route('book.create')}}"><button type="button" class="btn btn-outline-info">Crea Libro</button"></a>
                <a href="{{route('author.create')}}"><button type="button" class="btn btn-outline-info">Crea Autore</button"></a>
                <a href="{{route('author.index')}}"><button type="button" class="btn btn-outline-info">Tutti gli autori</button"></a>
                <a href="{{route('user.index')}}"><button type="button" class="btn btn-outline-info">Tutti gli utenti</button"></a>
                <a href="#">
            </div>

            <ul class="list-group">
                @foreach($authors as $key=>$author)
                <li class="list-group-item">
                    <p>Nome: {{$author -> name}}</p>
                    <p>Cognome: {{ $author->lastname }}</p>
                    <p>Pseudonimo: {{ $author->pseudonym }}</p>
                    <a href="{{route('author.show',$author->id)}}"><button type="button" class="btn btn-outline-info">Info</button></a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>