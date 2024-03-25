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

img {
    border-radius: 5px;
    max-height: 215px;
}

    </style>
<x-app-layout>

    <div class="py-12" style="min-height: 57%;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="justify-center">
                        @if($reviews->count() > 0)
                        @foreach($reviews as $review)
                        <div class="glass-effect-white shadow-md rounded-md mb-4 p-4 d-flex align-items-stretch">
    <div style="flex: 0 0 auto;">
        <img src="{{$review->book->cover}}" style="height:100%; object-fit: cover;">
    </div>
    <div class="m-3" style="flex-grow: 1;">
        <p><strong>Libro:</strong> {{ $review->book->title }}</p>
        <p><strong>Autore:</strong> {{ $review->book->authors->pseudonym }}</p>
        <p><strong>Titolo Recensione:</strong> {{ $review->title }}</p>
        <p><strong>Recensione:</strong> {{ $review->review }}</p>
        <p><strong>Voto:</strong> {{ $review->rating }} /5</p>
        <div class="flex justify-end mt-4">
            <a href="{{ route('review.edit', $review->id) }}"><button class="btn btn-customG me-2">Modifica</button></a>
            <form method="POST" action="{{ route('review.destroy', $review->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-custom" type="submit">Elimina</button>
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

</x-app-layout>
