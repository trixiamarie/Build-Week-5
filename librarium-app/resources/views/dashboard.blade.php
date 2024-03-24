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

.svg {

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
    <svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 150" version="1.1" xmlns="http://www.w3.org/2000/svg">
     <defs>
        <linearGradient id="wave-gradient" x1="0" x2="0" y1="1" y2="0">
            <stop stop-color="rgba(68, 164, 160, 1)" offset="0%"></stop>
            <stop stop-color="rgba(68, 164, 160, 1)" offset="100%"></stop>
        </linearGradient>
     </defs>
     <path style="transform:translate(0, 0px); opacity:1" fill="url(#wave-gradient)" d="M0,90L80,77.5C160,65,320,40,480,40C640,40,800,65,960,75C1120,85,1280,80,1440,77.5C1600,75,1760,75,1920,82.5C2080,90,2240,105,2400,115C2560,125,2720,130,2880,132.5C3040,135,3200,135,3360,122.5C3520,110,3680,85,3840,65C4000,45,4160,30,4320,35C4480,40,4640,65,4800,75C4960,85,5120,80,5280,65C5440,50,5600,25,5760,22.5C5920,20,6080,40,6240,52.5C6400,65,6560,70,6720,62.5C6880,55,7040,35,7200,32.5C7360,30,7520,45,7680,47.5C7840,50,8000,40,8160,30C8320,20,8480,10,8640,17.5C8800,25,8960,50,9120,60C9280,70,9440,65,9600,70C9760,75,9920,90,10080,100C10240,110,10400,115,10560,117.5C10720,120,10880,120,11040,112.5C11200,105,11360,90,11440,82.5L11520,75L11520,150L11440,150C11360,150,11200,150,11040,150C10880,150,10720,150,10560,150C10400,150,10240,150,10080,150C9920,150,9760,150,9600,150C9440,150,9280,150,9120,150C8960,150,8800,150,8640,150C8480,150,8320,150,8160,150C8000,150,7840,150,7680,150C7520,150,7360,150,7200,150C7040,150,6880,150,6720,150C6560,150,6400,150,6240,150C6080,150,5920,150,5760,150C5600,150,5440,150,5280,150C5120,150,4960,150,4800,150C4640,150,4480,150,4320,150C4160,150,4000,150,3840,150C3680,150,3520,150,3360,150C3200,150,3040,150,2880,150C2720,150,2560,150,2400,150C2240,150,2080,150,1920,150C1760,150,1600,150,1440,150C1280,150,1120,150,960,150C800,150,640,150,480,150C320,150,160,150,80,150L0,150Z"></path>
    </svg>
    <div id="bookCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($books as $index => $book)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="row">
                    <div class="col-md-6 carouseldata" data-color="{{ $book->color }}">
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
    <svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 150" version="1.1" xmlns="http://www.w3.org/2000/svg">
     <defs>
        <linearGradient id="wave-gradient" x1="0" x2="0" y1="1" y2="0">
            <stop stop-color="rgba(68, 164, 160, 1)" offset="0%"></stop>
            <stop stop-color="rgba(68, 164, 160, 1)" offset="100%"></stop>
        </linearGradient>
     </defs>
     <path style="transform:translate(0, 0px); opacity:1" fill="url(#wave-gradient)" d="M0,90L80,77.5C160,65,320,40,480,40C640,40,800,65,960,75C1120,85,1280,80,1440,77.5C1600,75,1760,75,1920,82.5C2080,90,2240,105,2400,115C2560,125,2720,130,2880,132.5C3040,135,3200,135,3360,122.5C3520,110,3680,85,3840,65C4000,45,4160,30,4320,35C4480,40,4640,65,4800,75C4960,85,5120,80,5280,65C5440,50,5600,25,5760,22.5C5920,20,6080,40,6240,52.5C6400,65,6560,70,6720,62.5C6880,55,7040,35,7200,32.5C7360,30,7520,45,7680,47.5C7840,50,8000,40,8160,30C8320,20,8480,10,8640,17.5C8800,25,8960,50,9120,60C9280,70,9440,65,9600,70C9760,75,9920,90,10080,100C10240,110,10400,115,10560,117.5C10720,120,10880,120,11040,112.5C11200,105,11360,90,11440,82.5L11520,75L11520,150L11440,150C11360,150,11200,150,11040,150C10880,150,10720,150,10560,150C10400,150,10240,150,10080,150C9920,150,9760,150,9600,150C9440,150,9280,150,9120,150C8960,150,8800,150,8640,150C8480,150,8320,150,8160,150C8000,150,7840,150,7680,150C7520,150,7360,150,7200,150C7040,150,6880,150,6720,150C6560,150,6400,150,6240,150C6080,150,5920,150,5760,150C5600,150,5440,150,5280,150C5120,150,4960,150,4800,150C4640,150,4480,150,4320,150C4160,150,4000,150,3840,150C3680,150,3520,150,3360,150C3200,150,3040,150,2880,150C2720,150,2560,150,2400,150C2240,150,2080,150,1920,150C1760,150,1600,150,1440,150C1280,150,1120,150,960,150C800,150,640,150,480,150C320,150,160,150,80,150L0,150Z"></path>
    </svg>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    let carousel = document.querySelector('#bookCarousel');
    carousel.addEventListener('slid.bs.carousel', function () {
        let activeItem = document.querySelector('.carousel-item.active');
        if (activeItem) { 
            let colorElement = activeItem.querySelector('.carouseldata');
            if (colorElement) { 
                let color = colorElement.dataset.color;
                document.querySelector('.hero').style.backgroundColor = color;
                carousel.style.backgroundColor = color;

               
                let svgGradient = document.getElementById('wave-gradient');
                if (svgGradient) {
                    svgGradient.querySelector('stop[offset="0%"]').setAttribute('stop-color', color);
                    svgGradient.querySelector('stop[offset="100%"]').setAttribute('stop-color', color);
                }
            }
        }
    });
});

</script>