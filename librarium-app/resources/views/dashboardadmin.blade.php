<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route('author.create')}}"><button type="button" class="btn btn-outline-info">Crea Autore</button"></a>
                <a href="{{route('author.index')}}"><button type="button" class="btn btn-outline-info">Gestisci Autori</button"></a>
            </div> -->
            <div class="d-flex flex-wrap">
                <a href="{{route('book.index')}}">
                    <div class="card" style="width: 20rem; height:25rem;">
                        <div class="card-body">
                            <h5 class="card-title">Libri</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Gestione</h6>
                        </div>
                    </div>
                </a>
                <a href="{{route('author.index')}}">
                    <div class="card" style="width: 20rem; height:25rem;">
                        <div class="card-body">
                            <h5 class="card-title">Autori</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Gestione</h6>
                        </div>
                    </div>
                </a>
                <a href="{{route('user.index')}}">
                    <div class="card" style="width: 20rem; height:25rem;">
                        <div class="card-body">
                            <h5 class="card-title">Utenti</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Gestione</h6>
                        </div>
                    </div>
                </a>
                <a href="{{route('genre.index')}}">
                    <div class="card" style="width: 20rem; height:25rem;">
                        <div class="card-body">
                            <h5 class="card-title">Generi</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Gestione</h6>
                        </div>
                    </div>
                </a>
                <a href="{{route('review.index')}}">
                    <div class="card" style="width: 20rem; height:25rem;">
                        <div class="card-body">
                            <h5 class="card-title">Recensioni</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Gestione</h6>
                        </div>
                    </div>
                </a>
                <!-- <a href="{{route('genre.index')}}">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Generi</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Gestione</h6>
                        </div>
                    </div>
                </a> -->
            </div>
        </div>
    </div>

</x-app-layout>