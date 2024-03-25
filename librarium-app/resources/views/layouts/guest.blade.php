<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Librarium') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
    html {
    height: 100%;
}

body {
    margin: 0;
}

@font-face {
        font-family: "Silka";
        src: url("{{ asset('fonts/Silka.ttf') }}");
        font-weight: normal;
        font-style: normal;
    }

@layer components {
    @keyframes slide {
        0% {
            transform: translateX(-25%);
        }
        100% {
            transform: translateX(25%);
        }
    }

    .bg {
        animation: slide 3s ease-in-out infinite alternate;
        background-image: linear-gradient(-60deg, #ffffff 50%, #44b4b0 50%);
        bottom: 0;
        left: -50%;
        opacity: 0.5;
        position: fixed;
        right: -50%;
        top: 0;
        z-index: -1;
    }

    .bg2 {
        animation-direction: alternate-reverse;
        animation-duration: 4s;
    }

    .bg3 {
        animation-duration: 5s;
    }

    .content {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 0.25em;
        box-shadow: 0 0 0.25em rgba(0, 0, 0, 0.25);
        box-sizing: border-box;
        left: 50%;
        padding: 10vmin;
        position: fixed;
        text-align: center;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .glass-effect {
    background-color: rgba(33, 107, 90, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 1dvh;
    border: 1px solid rgba(33, 107, 90, 0.3);
    padding: 5dvh !important;
    z-index: 1000;
}

* {
    font-family: 'Silka', sans-serif;
    color: #ffffff !important;
    text-decoration: none !important;
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

input {
    color: #3d4145 !important;
}

input:focus {
    border-color: #44b4b0 !important;
}

input[type="checkbox"]:checked {
    background-color: #44b4b0 !important;
}

::-webkit-scrollbar {
  width: 1dvh;
}

::-webkit-scrollbar-thumb {
  background-color: #44b4b0;
}

::-webkit-scrollbar-track {
  background-color: rgba (68, 180, 176, 0) !important;
}

::-webkit-scrollbar-thumb:hover {
  background-color: #31817f;
}
    </style>

</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
    <div class="min-h-screen flex sm:justify-center items-center pt-6 sm:pt-0">
        <div class="d-none d-sm-block">
            <a  href="/welcome" style="color: #ffffff !important;">
                <img class="mx-5" src="{{ asset('img/logowhite.png') }}" alt="Logo">
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg glass-effect">
            {{ $slot }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>