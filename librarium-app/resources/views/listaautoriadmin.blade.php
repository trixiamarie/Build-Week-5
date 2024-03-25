

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Autori') }}
        </h2>
        <a href="{{route('author.create')}}"><button type="button" class="btn btn-outline-info">Crea Autore</button"></a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5 bg-white border-b border-gray-200 d-flex flex-wrap justify-content-between">
                    @foreach ($authors as $author)
                    <div class="card p-2 mb-2 d-flex flex-column justify-content-evenly align-items-center" style="width: 20rem; height:30rem;">
                    <div>
                        <p class="fw-bold fs-3">{{$author->pseudonym}}</p>
                    </div>
                        <div style="width: 10rem; height: 10rem; border-radius: 50%; overflow: hidden; border: 0.5rem solid #9DBDB6;" class="text-center">
                            <img src="{{$author->avatar}}" alt="Descrizione dell'immagine" style="width: 100%; height: 100%;">
                        </div>
                        <div>
                            <p class=""><strong>ID:</strong>{{$author->id}}</p>
                            <p class=""><strong>Nome:</strong>{{$author->name}}</p>
                            <p class=""><strong>Cognome:</strong> {{$author->lastname}}</p>
                            <p class=""><strong>Pseudonimo:</strong> {{$author->pseudonym}}</p>
                            <p class=""><strong>Data di nascita:</strong> {{$author->birthday}}</p>
                            <p class=""><strong>Città:</strong> {{$author->city}}</p>
                            <p class=""><strong>N. libri nel database:</strong> {{$author->books->count()}}</p>
                        </div>

                        <div class="d-flex flex-wrap justify-content-between">
                            <a href="{{route('author.show', ['author' => $author])}}"><button class="btn btn-outline-info m-1">Dettaglio</button></a>
                            <a href="{{route('author.edit', ['author'=>$author])}}"><button class="btn btn-outline-info m-1">Modifica</button></a>
                            <form action="{{route('author.destroy',['author'=>$author])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger m-1">Cancella</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>