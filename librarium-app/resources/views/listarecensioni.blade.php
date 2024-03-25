<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Le mie recensioni') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="md:flex justify-center">
                        @if($reviews->count() > 0)
                        @foreach($reviews as $review)
                        <div class="bg-white shadow-md rounded-md mb-4 p-4 d-flex">
                            <img src="{{$review->book->cover}}" style="height:10rem;">
                            <div class="m-3">
                                <p><strong>Libro:</strong> {{ $review->book->title }}</p>
                                <p><strong>Autore:</strong> {{ $review->book->authors->pseudonym }}</p>
                                <p><strong>Titolo Recensione:</strong> {{ $review->title }}</p>
                                <p><strong>Recensione:</strong> {{ $review->review }}</p>
                                <p><strong>Voto:</strong> {{ $review->rating }} /5</p>
                                <div class="flex justify-end mt-4">
                                    <a href="{{ route('review.edit', $review->id) }}"><button class="btn btn-outline-info">Modifica</button></a>
                                    <form method="POST" action="{{ route('review.destroy', $review->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="text-center">Nessuna recensione disponibile al momento.</p>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>