<style>
    .btn-custom {
        margin-top: 2dvh !important;
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

    img {
        border-radius: 5px;
        max-height: 300px;
    }

    .card {
        margin: 1em auto;
        padding: 1em; 
        text-align: center; 
    }

    @media (max-width: 576px) { 
        .card {
            margin: 1em 0.5em; 
        }

        .col-md-4 {
        display: flex;
        justify-content: center;
    }

    img {
        margin: auto;
    }
    }
</style>

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                @foreach($bookings as $key => $booking)
                <div class="col-md-6">
                    <div class="card mb-3 my-6 shadow-md glass-effect-white" style="width: 100%;">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4">
                                <img src="{{ $booking->books->cover}}" alt="Cover" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $booking->books->title}}</h5>
                                    <p class="card-text">Autore: {{ $booking->books->authors->pseudonym}}</p>
                                    <p class="mb-0">Data di ritiro: {{ date_create($booking->collectiondate)->format('jS M Y') }}</p>
                                @if($booking->state === 'accettato')
                                <p class="mb-0">Data di ritorno: {{ date_create($booking->return)->format('jS M Y') }}</p>
                                @elseif($booking->state === 'negato')
                                <p class="mb-0 text-danger">La tua prenotazione non è stata accettata</p>
                                @else
                                <p class="mb-0 text-warning">Una volta accettata la prenotazione, ti verrà confermata la data di ritorno</p>
                                @endif
                                    <form method="post" action="{{route('booking.destroy', ['booking' => $booking])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type='submit' class="btn btn-custom">Cancella Prenotazione</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(($key + 1) % 2 == 0)
                <div class="w-100"></div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>