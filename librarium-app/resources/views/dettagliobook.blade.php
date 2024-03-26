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
        margin-top: 20px !important;
        background-color: white !important;
        color: #44b4b0 !important;
        transition: background-color 1s ease, color 1s ease !important;
        font-family: 'Silka', sans-serif !important;
    }

    .btn-custom:hover {
        color: white !important;
        background-color: #44b4b0 !important;
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

    .custom-text-color {
        color: #44b4b0 !important;
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
    <div class="container col-10 bg-white">
        <div class="d-flex">
            <div class="p-3" style="overflow: scroll; height: 25rem;width:50%;">
                <p class=""><strong>Editore: </strong></br>{{$book->publisher}}</p>
                <p class=""><strong>Data di pubblicazione: </strong></br>{{date_create($book->released)->format('js M Y')}}}</p>
                <p class="mt-2"><strong>Trama:</strong></br>{{$book->plot}}</p>
                <p class="mt-2"><strong>Genere:</strong> {{$book->genres->name}}</p>

            </div>
            <div class="d-flex mt-2 justify-content-evenly align-items-center" style="background-color:{{$book->color;}};color: white;height: 25rem; overflow:scroll; width:50%;">
                <div style="width: 12rem;" class="ps-4">
                    <div style="width: 10rem; height: 10rem; border-radius: 50%; overflow: hidden; border: 0.5rem solid #9DBDB6;" class="text-center">
                        <img src="{{$book->authors->avatar}}" alt="Descrizione dell'immagine" style="width: 100%; height: 100%;">
                    </div>
                </div>
                <div class="m-4">
                    <!-- bio autore -->
                    <div class="author-container ">
                        <p class="fs-2 mb-2">{{$book->authors->pseudonym}}</p>
                        <p class="mb-2"><strong>Nome e Cognome:</strong> {{$book->authors->name}} {{$book->authors->lastname}}</p>
                        <p class="mb-2"><strong>Data di nascita:</strong> {{date_create($book->authors->birthday)->format('js M Y')}}</p>
                        <p class="mb-2"><strong>Provenienza:</strong> {{$book->authors->city}}</p>
                        <p class="mb-2"><strong>Biografia:</strong> {{$book->authors->bio}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5" style="background-color:{{$book->color;}}; border-radius: 50px; color: white;">



        </div>



        <div class="d-flex mt-4 bg-white">
            <div style="width:50%;overflow:scroll; height:542px;">
            <p class="fs-3  text-center custom-text-color">Recensioni</p>
                @if($book->reviews->count() > 0)
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
                        <!-- <button>Modifica</button> -->
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
                @else
                <div>
                    <p>Questo libro non ha ancora recensioni.</p>
                </div>
                @endif

            </div>
            <div style="width:50%;">
            @if($book->reviews->where('user_id', Auth::user()->id)->isEmpty())
            @include('partials.nuovarecensione')
            @else
            @include('partials.modificarecensione')
            @endif
            </div>

        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="bg-white p-4">
                        <h2 class="fs-3 text-center mb-5 custom-text-color">Altri libri dello stesso autore</h2>
                        <div id="carouselSameAuthor" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($sameAuthorBooks->chunk(3) as $index => $chunk)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="row row-cols-1 row-cols-md-3 g-4">
                                        @foreach($chunk as $book)
                                        <div class="col">
                                            <div class="card h-100">
                                                <img src="{{$book->cover}}" class="card-img-top" alt="{{$book->title}}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$book->title}}</h5>
                                                    <a href="{{route('book.show', ['book' => $book->id])}}" class="btn btn-custom">Vedi dettagli</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselSameAuthor" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselSameAuthor" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class="bg-white p-4">
                        <h2 class="fs-3  text-center mb-5 custom-text-color">Altri libri dello stesso genere</h2>
                        <div id="carouselSameGenre" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($sameGenreBooks->chunk(3) as $index => $chunk)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="row row-cols-1 row-cols-md-3 g-4">
                                        @foreach($chunk as $book)
                                        <div class="col">
                                            <div class="card h-100">
                                                <img src="{{$book->cover}}" class="card-img-top" alt="{{$book->title}}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$book->title}}</h5>
                                                    <a href="{{route('book.show', ['book' => $book->id])}}" class="btn btn-custom">Vedi dettagli</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselSameGenre" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselSameGenre" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>