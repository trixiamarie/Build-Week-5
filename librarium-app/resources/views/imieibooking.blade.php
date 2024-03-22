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

                <p>{{$bookings[0]}}</p>

                <ul>
                    @foreach($bookings as $booking)
                    <li>
                        <p>{{ $booking->user}}</p>
                        <img src="{{ $booking->books->cover}}" alt="iauydgf" />
                        <p>Titolo: {{ $booking->books->title}}</p>
                        <p>Autore: {{ $booking->books->authors->pseudonym}}</p>
                        <p>Data di ritiro: {{ $booking->collectiondate }}</p>
                        <p>Data di ritorno: {{$booking->return}} </p>
                        <form method="post" action="{{route('booking.destroy', ['booking' => $booking])}}">
                            @csrf
                            @method('DELETE')
                            <button type='submit' class="btn btn-outline-danger">Cancella Prenotazione</button>
                        </form>
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</x-app-layout>