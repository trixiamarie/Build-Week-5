<style>
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Silka', sans-serif !important;
    }

    .btn-custom {
        background-color: #44b4b0 !important;
        color: white !important;
        transition: background-color 0.5s ease !important;
    }

    .btn-custom:hover {
        background-color: #216b5a !important;
    }

    body::after {
        content: "";
        background: url("{{$book->cover}}");
        /* background-color: #44A5A1; */
        background-size: cover;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: -1;
        filter: blur(15px);

    }
</style>

<x-app-layout>
    <!-- <div class="card mb-3 mx-auto" style="max-width: 800px; margin-top: 50px; background-color: #f8f9fa">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{$book->cover}}" class="img-fluid rounded-start" alt="{{$book->title}}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fs-1">{{$book->title}}</h5>
                    <p class="card-text mt-2"><small class="text-muted">Pubblicato da {{$book->publisher}} il {{$book->released}}</small></p>
                    <p class="card-text mt-4">{{$book->plot}}</p>
                    <p class="card-text mt-4"><strong>Autore:</strong> {{$book->authors->name}} {{$book->authors->lastname}}</p>
                    <p class="card-text mt-4"><strong>Genere:</strong> {{$book->genres->name}}</p>
                    @if($book->copies > 0)
                    <a href="{{route('booking.create',['book'=>$book->id])}}" class="btn btn-custom mt-4">Prenota</a>
                    @else
                    <button type="button" class="btn btn-secondary disabled mt-4">Prenotazione non disponibile</button>
                    @endif
                </div>
            </div>
        </div>
    </div> -->

    <div class="d-flex px-5 align-items-center justify-content-center">
        <img src="{{$book->cover}}" class="rounded" alt="{{$book->title}}" style="margin: 3rem; height: 30rem; box-shadow: 10px 10px 10px #00000070;">
        <div style="margin: 3rem;">
            <h5 class="card-title" style="font-size: 4rem; text-shadow: 2px 2px 4px rgb(0 0 0); color: white;">{{$book->title}}</h5>
            <p class="mt-4" style="font-size: 2rem; text-shadow: 2px 2px 4px rgb(0 0 0); color: white;">{{$book->authors->pseudonym}}</p>
            <div>
                @if($book->copies > 0)
                <a href="{{route('booking.create',['book'=>$book->id])}}" class="btn btn-custom mt-4">Prenota</a>
                @else
                <button type="button" class="btn btn-secondary disabled mt-4">Prenotazione non disponibile</button>
                @endif
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div>
            <p class="card-text mt-2"><small class="text-muted">Pubblicato da {{$book->publisher}} il {{$book->released}}</small></p>
            <p class="card-text mt-4">{{$book->plot}}</p>
            <p class="card-text mt-4"><strong>Genere:</strong> {{$book->genres->name}}</p>
        </div>
        <div class="row mt-5 bg-white">
            <div class="col-12">
                <h3>Recensioni</h3>
                @foreach($book->reviews as $review)
                <div class="card mb-3 bg-white">
                    <div class="card-body">
                        <h5 class="card-title">{{$review->title}}</h5>
                        <p class="card-text">{{$review->review}}</p>
                        <div>
                            <p>{{$review->rating}}/5</p>
                            @for ($i = 0; $i < $review->rating; $i++)
                                <i class="bi bi-star-fill text-warning"></i>
                                @endfor
                        </div>

                        <p>scritto da: {{$review->user->name}} {{$review->user->lastname}}</p>
                        @if($review->user_id == Auth::user()->id)
                        <button>Modifica</button>
                        <form method="POST" action="{{ route('review.destroy', $review->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="source" value="form1">
                            <input type="hidden" name="bookid" value="{{$book->id}}">
                            <button class="btn btn-outline-danger" type="submit">Elimina</button>
                        </form>

                        @endif
                    </div>
                </div>
                @endforeach

            </div>
            @if($book->reviews->where('user_id', Auth::user()->id)->isEmpty())
            @include('partials.nuovarecensione')
            @endif

        </div>
        <div class="row mt-5 bg-white">
            <div class="col-12">
                <h3>Altri libri dello stesso autore</h3>
                <div class="carousel">
                    @foreach($sameAuthorBooks as $book)
                    <div class="card" style="width: 18rem;">
                        <img src="{{$book->cover}}" class="card-img-top" alt="{{$book->title}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$book->title}}</h5>
                            <a href="{{route('book.show', ['book' => $book->id])}}" class="btn btn-primary">Vedi dettagli</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-5 bg-white">
            <div class="col-12">
                <h3>Altri libri dello stesso genere</h3>
                <div class="carousel">
                    @foreach($sameGenreBooks as $book)
                    <div class="card" style="width: 18rem;">
                        <img src="{{$book->cover}}" class="card-img-top" alt="{{$book->title}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$book->title}}</h5>
                            <a href="{{route('book.show', ['book' => $book->id])}}" class="btn btn-primary">Vedi dettagli</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>