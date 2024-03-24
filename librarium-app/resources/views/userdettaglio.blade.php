

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{$user -> name}} {{$user -> lastname}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route('book.create')}}"><button type="button" class="btn btn-outline-info">Crea Libro</button"></a>
                <a href="{{route('author.create')}}"><button type="button" class="btn btn-outline-info">Crea Autore</button"></a>
                <a href="{{route('author.index')}}"><button type="button" class="btn btn-outline-info">Tutti gli autori</button"></a>
                <a href="{{route('user.index')}}"><button type="button" class="btn btn-outline-info">Tutti gli utenti</button"></a>
            </div> -->

            <ul class="list-group">
                
                <li class="list-group-item">
                    <p>Nome: {{$user -> name}}</p>
                    <p>Cognome: {{$user -> lastname}}</p>
                    <p>Data di nascita: {{$user -> dateofbirth}}</p>
                    <p>Città: {{$user -> city}}</p>
                    <p>Email: {{ $user->email }}</p>

                    <a href="{{route('user.edit',['user' => $user])}}"><button type="button" class="btn btn-outline-info">Modifica</button></a>

                    <form method="POST" action="{{route('user.destroy',['user' => $user])}}">
                    @csrf
                    @method('DELETE')    
                    <button type="submit" class="btn btn-outline-danger">Elimina</button></a></form>
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>