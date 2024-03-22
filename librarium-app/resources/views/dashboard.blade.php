<style>

@import url('https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&family=Rosarivo:ital@0;1&display=swap');

.hero {
    height: 90vh;
    background: rgb(68,180,176);
    background: linear-gradient(90deg, rgba(68,180,176,1) 35%, rgba(69,149,146,1) 100%);
}

h1 {
    color: white !important;
    text-align: center;
    font-size: 5dvh !important;
    font-family: 'Rosarivo', serif;
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
    font-size: 4dvh !important;
    font-family: 'Rosarivo', serif;

}

.carouseldata h6 {
    font-size: 3dvh !important;
    font-family: 'DM Mono', monospace;
}

.carouseldata p {
    font-size: 2dvh !important;
    font-family: 'DM Mono', monospace;
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
    color: #44A8A4 !important;
    border-color: #44A8A4 !important;
    background-color: white !important;
}

.btn-outline-info:hover {
    color: white !important;
    background-color: #44A8A4 !important;
}

</style>

<x-app-layout>

<div class="hero">
    <h1 class="py-6" style="z-index: 5 !important;">Ciao {{ Auth::user()->name }}, ecco gli ultimi arrivi</h1>
    <img src="{{ asset('img/wave.svg') }}" alt="Descrizione dell'immagine SVG" style="margin-top: -20vh; z-index: -3 !important;">
    <div id="bookCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($books as $index => $book)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="row">
                        <div class="col-md-6 carouseldata">
                            <h5 class="pb-2">{{ $book->title }}</h5>
                            <h6 class="pb-2">{{ $book->authors->name }} {{ $book->authors->lastname }}</h6>
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
</div>
<div style="transform: rotate(180deg);">
    <img src="{{ asset('img/wave.svg') }}" alt="Descrizione dell'immagine SVG">
</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($books->shuffle() as $book)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $book->cover }}" class="card-img-top" alt="{{ $book->title }}">
                        <div class="card-body">
                            <a href="{{route('book.show',$book->id)}}" class="btn btn-outline-info">Info</a>
                            <div id="collapse{{ $book->id }}" class="collapse">
                                <h5 class="card-title fw-bold fs-4 pt-4 pb-0" style="color: #3d4145 !important;">{{ $book->title }}</h5>
                                <p class="card-text fs-5 pb-2" style="color: #3d4145 !important;">{{ $book->authors->name }} {{ $book->authors->lastname }}</p>
                                <p class="card-text fs-6" style="color: #3d4145 !important;">{{ $book->plot }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


</x-app-layout>