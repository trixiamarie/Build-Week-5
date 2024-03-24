<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Styles -->
        <style>

            @font-face {
    font-family: 'Silka';
    src: url('{{ asset('fonts/silka.ttf') }}');
    font-weight: normal;
    font-style: normal;
}

            * {
                margin: 0 !important;
                padding: 0 !important;
                box-sizing: border-box !important;
                font-family: 'Silka', sans-serif !important;
            }

            body {
                position: relative !important;
                overflow: hidden !important;
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
                min-height: 100vh !important;
                background-color: #44b4b0; 
            }

            .container {
                position: absolute !important;
                width: 100% !important;
                height: 100% !important;
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
            }

            h2 {
                color: #ffffff !important;
                font-size: 8dvh !important;
                line-height: 1em !important;
                font-weight: 900 !important;
                z-index: 1000 !important;
                text-align: center !important;
            }

            p {
                color: #ffffff !important;
                font-size: 3dvh !important;
                letter-spacing: 0.5dvh !important;
                font-weight: 300 !important;
                text-transform: uppercase !important;
            }

.book-container {
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.book-cover {
    max-width: 8dvh !important; 
    box-shadow: 1dvh 1dvh 5dvh rgba(0,0,0,0.2) !important;
    border-radius: 2px;
}

.glass-effect {
    background-color: rgba(33, 107, 90, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 1dvh;
    border: 1px solid rgba(33, 107, 90, 0.3);
    padding: 5dvh !important;
    z-index: 1000;
}

.btn-custom {
    margin-top: 2dvh !important;
    background-color: white !important;
    color: #44b4b0 !important;
    transition: background-color 1s ease !important;
    tansition: color 1s ease !important;
    font-family: 'Silka', sans-serif !important;
}

.btn-custom:hover {
    color: white !important;
    background-color: #44b4b0 !important;
}

        </style>
    </head>
    <body>
    <div class="container">
    <div class="glass-effect">
        <h2>Librarium</h2>
        <p>BOOKS FOR ALL AGES</p>
        <div class="row text-center">
            <div class="col">
                <a href="/register"><button type="button" class="btn btn-custom w-75">Registrati</button></a>
            </div>
            <div class="col">
                <a href="/login"><button type="button" class="btn btn-custom w-75">Accedi</button></a>
            </div>
        </div>
    </div>
</div>
        @foreach($books->shuffle() as $book)
    <div class="book-container">
        <img src="{{ $book->cover }}" alt="{{ $book->title }}" class="book-cover">
    </div>
@endforeach
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
        <script>
function animateCovers() {
anime({
    targets: '.book-cover',
    translateX: function (){
        return anime.random(-700, 700);
    },
    translateY: function (){
        return anime.random(-500, 500);
    },
    scale: function (){
        return anime.random(1, 5);
    },
    easing: 'linear',
    duration: 9000,
    delay: anime.stagger(10),
    complete: animateCovers
})
}
animateCovers();

            </script>
    </body>
</html>
