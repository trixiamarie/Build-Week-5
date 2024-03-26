<style>
.glass-effect-white {
    background-color: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(10px);
    border-radius: 1dvh;
    border: 1px solid rgba(255, 255, 255, 0.6);
    z-index: 1000;
}

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
            {{ __('Prenotazioni') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Libro</th>
                                <th scope="col">Utente</th>
                                <th scope="col">Date</th>
                                <th scope="col">Stato</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($bookings->count() > 0)
                            @foreach($bookings as $index => $booking)
                            <tr>
                                <th scope="row">{{$booking->id}}</th>
                                <td>
                                    <div class="book-details d-flex align-items-center">
                                        <img src="{{ $booking->books->cover }}" alt="Copertina del libro" style="height:10rem;">
                                        <div class="p-1">
                                            <p><strong>Titolo:</strong> {{ $booking->books->title }}</p>
                                            <p><strong>Autore:</strong> {{ $booking->books->authors->name }} {{ $booking->books->authors->lastname }}</p>
                                            <p><strong>Data di pubblicazione:</strong> {{ $booking->books->released }}</p>
                                            <p><strong>Casa editrice:</strong> {{ $booking->books->publisher }}</p>
                                            <p><strong>ISBN:</strong> {{ $booking->books->isbn }}</p>
                                            <p><strong>Numero di copie disponibili:</strong> {{ $booking->books->copies }}</p>
                                            <p><strong>Genere:</strong> {{ $booking->books->genre }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="user-info">
                                        <p><strong>Utente:</strong> {{ $booking->users->name }} {{ $booking->users->lastname }}</p>
                                        <p><strong>Email:</strong> {{ $booking->users->email }}</p>
                                        <p><strong>Città:</strong> {{ $booking->users->city }}</p>
                                        <p><strong>Data di nascita:</strong> {{ $booking->users->dateofbirth }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="booking-details">
                                        <div class="booking-dates">
                                            <p><strong>Data di ritiro:</strong> {{ $booking->collectiondate }}</p>
                                            <p><strong>Data di ritorno:</strong> {{ $booking->return }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p>{{ $booking->state }}</p>
                                </td>
                                <td>
                                    <div class="d-flex">
                                    @if($booking->state === 'pending')
                                    <form method="POST" action="{{ route('booking.update', ['booking' => $booking->id]) }}" class="m-0" style="height:38px;">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="state" value="accettato">
                                        <button type="submit" onclick="return confirm('Sei sicuro di ACCETTARE la prenotazione?')" class="btn btn-custom">Accetta</button>
                                    </form>
                                    <form method="POST" action="{{ route('booking.update', ['booking' => $booking->id]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="state" value="negato">
                                        <button type="submit" onclick="return confirm('Sei sicuro di NON ACCETTARE la prenotazione?')" class="btn btn-customG mt-0">Cancella</button>
                                    </form>
                                    </div>
                                    @else
                                    <button class="btn btn-custom disabled">
                                        Accetta
                                    </button>
                                    <button class="btn btn-customG disabled mt-0">
                                        Cancella
                                    </button>
                                    @endif
                                </td>
                            </tr>

                            @endforeach
                            @else
                            <p>Nessuna prenotazione disponibile al momento.</p>
                            @endif
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>

</x-app-layout>