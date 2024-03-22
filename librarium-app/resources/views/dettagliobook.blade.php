

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <p>{{$book}}</p>
                @if($book->copies > 0)
                <a href="{{route('booking.create',['book'=>$book->id])}}"><button type="button" class="btn btn-outline-info">Prenotazione</button></a>
                @else
                <button type="button" class="btn btn-secondary disabled">Prenotazione non disponibile</button>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>