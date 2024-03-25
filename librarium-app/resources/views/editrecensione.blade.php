<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifica Genere') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                    <form method="POST" action="{{ route('review.update', ['review' => $review->id]) }}" class="bg-white rounded-md px-8 pt-6 pb-8 m-4">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Titolo
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" value="{{ $review->title }}" placeholder="Inserisci il titolo della recensione">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="review">
                                Recensione
                            </label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="review" name="review" placeholder="Inserisci qui la tua recensione">{{ $review->review }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">
                                Voto
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="rating" name="rating" type="number" min="1" max="5" value="{{ $review->rating }}" placeholder="Inserisci un voto da 1 a 5">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="btn btn-outline-info" type="submit">
                                Aggiorna Recensione
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>