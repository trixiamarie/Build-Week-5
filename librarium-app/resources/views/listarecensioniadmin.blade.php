<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prenotazioni') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @foreach ($reviews as $review)
                    <p class="p-6 bg-white border-b border-gray-200">{{$review}}</p>
                    <form method="POST" action="{{ route('review.destroy', $review->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="source" value="formadmin">
                            <button class="btn btn-outline-danger" type="submit">Elimina</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>