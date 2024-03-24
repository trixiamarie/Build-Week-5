<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Le mie prenotazioni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <ul class="list-unstyled">
                    @foreach($bookings as $booking)
                    <li class="m-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="d-flex align-items-center justify-content-between">

                            <div class="ml-3 d-flex align-items-center">
                                <div class="m-3">
                                    <img src="{{ $booking->books->cover }}" alt="Copertina libro" style="max-width: 150px;">
                                </div>
                                <div>
                                <p class="mb-0">Titolo: {{ $booking->books->title }}</p>
                                <p class="mb-0">Autore: {{ $booking->books->authors->pseudonym }}</p>
                                </div>
                            </div>
                            <div class="m-3">
                                <p class="mb-0">Data di ritiro: {{ $booking->collectiondate }}</p>
                                @if($booking->state === 'accettato')
                                <p class="mb-0">Data di ritorno: {{ $booking->return }}</p>
                                @elseif($booking->state === 'negato')
                                <p class="mb-0">La tua prenotazione</br> non è stata accettata</p>
                                @else
                                <p class="mb-0">Una volta accettata la prenotazione,</br>ti verrà confermata la data di ritorno</p>
                                @endif
                                <form method="post" action="{{ route('booking.destroy', ['booking' => $booking]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger mt-3">Cancella Prenotazione</button>
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