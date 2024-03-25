<style>
  .btn-custom {
      background-color: white !important;
      color: #44b4b0 !important;
      transition: background-color 1s ease !important;
      transition: color 1s ease !important;
      font-family: 'Silka', sans-serif !important;
  }

.btn-custom:hover {
      color: white !important;
      background-color: #44b4b0 !important;
}

.btn-customG {
    margin-top: 2dvh !important;
    background-color: #A9B2BB !important;
    color: white !important;
    transition: background-color 1s ease !important;
    tansition: color 1s ease !important;
    font-family: 'Silka', sans-serif !important;
}

.btn-customG:hover {
    color: white !important;
    background-color: #3d4145 !important;
}
  
</style>
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recensioni') }}
        </h2>
    </x-slot>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="glass-effect-white px-6 overflow-hidden shadow-sm sm:rounded-lg">
            <ul class="list-none">
                <li class="py-3 border-b border-gray-200">
                    <div class="grid grid-cols-12 gap-3">
                        <div class="col-span-1 font-bold">Nome</div>
                        <div class="col-span-1 font-bold">Cognome</div>
                        <div class="col-span-1 font-bold">Libro</div>
                        <div class="col-span-2 font-bold">Valutazione</div>
                        <div class="col-span-1 font-bold">Titolo</div>
                        <div class="col-span-3 font-bold">Recensione</div>
                        <div class="col-span-1 font-bold">Creato</div>
                        <div class="col-span-1 font-bold">Aggiornato</div>
                        <div class="col-span-1"></div>
                    </div>
                </li>
                @foreach ($reviews as $review)
                <li class="py-3 border-b border-gray-200">
                    <div class="grid grid-cols-12 gap-3">
                        <div class="col-span-1">{{$review->user->name}}</div>
                        <div class="col-span-1">{{$review->user->lastname}}</div>
                        <div class="col-span-1">{{$review->book->title}}</div>
                        <div class="col-span-2 text-lg">
                            @for ($i = 0; $i < $review->rating; $i++)
                                <i class="bi bi-star-fill text-warning"></i>
                            @endfor
                            @for ($i = $review->rating; $i < 5; $i++)
                                <i class="bi bi-star text-warning"></i>
                            @endfor
                        </div>
                        <div class="col-span-1">{{$review->title}}</div>
                        <div class="col-span-3">{{$review->review}}</div>
                        <div class="col-span-1 text-sm">{{$review->created_at}}</div>
                        <div class="col-span-1 text-sm">{{$review->updated_at}}</div>
                        <div class="col-span-1">
                            <form method="POST" action="{{ route('review.destroy', $review->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="source" value="formadmin">
                                <button class="btn btn-customG" onclick="return confirm('Sei sicuro di voler eliminare?')" type="submit">Elimina</button>
                            </form>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>





</x-app-layout>
