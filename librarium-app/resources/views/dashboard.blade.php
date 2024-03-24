<style>

@font-face {
    font-family: 'Silka';
    src: url('{{ asset('fonts/silka.ttf') }}');
    font-weight: normal;
    font-style: normal;
}

p {
    font-family: 'Silka', sans-serif;
}

.hero {
    height: 90vh;
    background: rgb(68,180,176);
    background: linear-gradient(90deg, rgba(68,180,176,1) 35%, rgba(69,149,146,1) 100%);
}

h1 {
    color: white !important;
    text-align: center;
    font-size: 5dvh !important;
    font-family: 'Silka', sans-serif;
    position: relative;
}

.carouseldata {
    color: white !important;
    padding: 5% !important;
    padding-left: 20% !important;
    display: flex !important;
    justify-content: center !important;
    flex-direction: column !important;
}

.carouseldata h5 {
    font-size: 6dvh !important;
    font-family: 'Silka', sans-serif;

}

.carouseldata h6 {
    font-size: 3dvh !important;
    font-family: 'Silka', sans-serif;
}

.carouseldata p {
    font-size: 2dvh !important;
    font-family: 'Silka', sans-serif;
}

.carouselimage {
    width: 40dvh !important;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    display: none !important;
}

.carouselimagediv {
    display: flex !important;
    padding-right: 20% !important;
    justify-content: center !important;
    align-items: center !important;
    flex-direction: column !important;
}

#bookCarousel {
    background-color: #224E4C !important;
    height: 74vh !important;
    display: flex !important;
    justify-content: center !important;
}

#bookCarousel {
    position: relative;
}

.hero > img,
div > img {
    width: 100%;
}

.hero > img {
    bottom: 0;
}

div > img {
    top: 0;
}

.btn-outline-info {
    color: #ffffff !important;
    border-color: #ffffff !important;
    background-color: none !important;
}

.btn-outline-info:hover {
    color: white !important;
    background-color: #44A8A4 !important;
}

.card {
        position: relative;
        overflow: hidden;
        background-color: black !important;
        border: none !important;
    }

    .card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

    .card:hover img {
        transform: scale(1.1);
        opacity: 0.2;
        transition: transform 0.5s ease, opacity 0.5s ease;
    }

    .card:not(:hover) img {
    transform: scale(1);
    opacity: 1;
    transition: transform 0.5s ease, opacity 0.5s ease;
}

    .card-body {
        position: absolute;
        padding: 0 !important;
        width: 90%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease;
    }

    .card:hover .card-body {
        opacity: 1;
        visibility: visible;
    }

</style>

<x-app-layout>

<div class="hero pb-6">
    <h1 class="py-6">Ciao {{ Auth::user()->name }}, ecco gli ultimi arrivi</h1>
    <img src="{{ asset('img/wave.svg') }}" alt="Descrizione dell'immagine SVG" style="margin-top: -20dvh;">
    <div id="bookCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($books as $index => $book)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="row">
                        <div class="col-md-6 carouseldata">
                            <h5 class="pb-2">{{ $book->title }}</h5>
                            <h6 class="pb-2">{{ $book->authors->pseudonym}}</h6>
                            <p>{{ $book->plot }}</p>
                        </div>
                        <div class="col-md-6 carouselimagediv">
                            <img src="{{ $book->cover }}" class="d-block carouselimage" alt="{{ $book->title }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bookCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Precedente</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bookCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Successivo</span>
        </button>
    </div>
    <div style="transform: rotate(180deg); margin-top: -1dvh;">
        <img src="{{ asset('img/wave.svg') }}" alt="Descrizione dell'immagine SVG">
    </div>
</div>

<div class="d-flex align-items-center justify-content-center py-6" style="padding-top: 27dvh !important;">
  <h1 style="color: #44A8A4 !important;">La tua prossima lettura:</h1>
  <input type="text" class="form-control rounded" placeholder="Ricerca un autore o un libro" style="margin-left: 20px; width: 20%;">
</div>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach($books->shuffle() as $book)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $book->cover }}" class="card-img-top" alt="{{ $book->title }}">
                        <div class="card-body">
                            <h5 class="card-title text-white fw-bold" style="font-size: 3dvh;">{{ $book->title }}</h5>
                            <p class="card-text text-white py-3 fw-bold">{{ $book->authors->name }} {{ $book->authors->lastname }}</p>
                            <p class="card-text text-white pb-3">{{ $book->plot }}</p>
                            <a href="{{ route('book.show', $book->id) }}" class="btn btn-outline-info">Maggiori Informazioni</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{ $books->links() }}
    </div>

</x-app-layout>