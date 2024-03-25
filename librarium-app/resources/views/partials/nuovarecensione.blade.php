<section>
<div class="md:flex justify-center">
    <div class="w-full md:w-1/2 px-4 py-6">
        <h2 class="text-center font-semibold text-xl mb-5">Nuova Recensione</h2>
        <form method="POST" action="{{ route('reviews.store', $book->id) }}" class="bg-white  rounded-md px-8 pt-6 pb-8 m-5">

            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Titolo 
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" placeholder="Inserisci il titolo della recensione">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="review">
                    Recensione
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="review" name="review" placeholder="Inserisci qui la tua recensione"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">
                    Voto
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="rating" name="rating" type="number" min="1" max="5" placeholder="Inserisci un voto da 1 a 5">
            </div>
            <div class="flex items-center justify-between">
                <button class="btn btn-outline-info" type="submit">
                    Invia Recensione
                </button>
            </div>
        </form>
    </div>
</div>

</section>