<style>
    .btn-custom {
    margin-top: -2dvh !important;
    margin-bottom: -4dvh !important;
    background-color: #A9B2BB !important;
    color: white !important;
    transition: background-color 1s ease !important;
    tansition: color 1s ease !important;
    font-family: 'Silka', sans-serif !important;
}

.btn-custom:hover {
    color: white !important;
    background-color: #3d4145 !important;
}

.btn-customG {
    margin-top: -2dvh !important;
    margin-bottom: -4dvh !important;
    background-color: white !important;
    border: 1px solid #44A9A5 !important;
    color: #44A9A5 !important;
    transition: background-color 1s ease !important;
    tansition: color 1s ease !important;
    font-family: 'Silka', sans-serif !important;
}

.btn-customG:hover {
    color: white !important;
    background-color: #44A9A5 !important;
}

.glass-effect-white {
    background-color: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(10px);
    border-radius: 1dvh;
    border: 1px solid rgba(255, 255, 255, 0.6);
    z-index: 1000;
}

</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $book['title'] }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-effect-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-5 d-flex justify-content-evenly">
                    <img src="{{ $book['cover'] }}" alt="Cover" class="border-radius">
                </div>
                <div class="p-5">
                    <p class="mb-1"><strong>Titolo:</strong> {{ $book['title'] }}</p>
                    <p class="mb-1"><strong>Autore:</strong> {{ $book['authors']['name'] }} {{ $book['authors']['lastname'] }}</p>
                    <p class="mb-1"><strong>Data di pubblicazione:</strong> {{ $book['released'] }}</p>
                    <p class="mb-1"><strong>Editore:</strong> {{ $book['publisher'] }}</p>
                    <p class="mb-1"><strong>Casa editrice:</strong> {{ $book['publisher'] }}</p>
                    <p class="mb-1"><strong>ISBN:</strong> {{ $book['isbn'] }}</p>
                    <p class="mb-1"><strong>Numero di copie disponibili:</strong> {{ $book['copies'] }}</p>
                    <p class="mb-1"><strong>Genere:</strong> {{ $book['genre'] }}</p>
                    <p class="mb-1"><strong>Trama:</strong> {{ $book['plot'] }}</p>
                </div>

                <div class="p-5 d-flex justify-content-evenly">
                    <a href="{{route('book.edit',['book'=>$book])}}"><button type="button" class="btn btn-customG">Modifica</button></a>

                    <form action="{{route('book.destroy',['book'=>$book])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare?')" class="btn btn-custom">Cancella</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
</x-app-layout>