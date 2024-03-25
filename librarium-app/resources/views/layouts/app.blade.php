<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Styles -->
        <style>
            .glass-effect {
    background-color: rgba(33, 107, 90, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 1dvh;
    border: 1px solid rgba(33, 107, 90, 0.3);
    padding: 5dvh !important;
    z-index: 1000;
}

.glass-effect-white {
    background-color: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(10px);
    border-radius: 1dvh;
    border: 1px solid rgba(255, 255, 255, 0.6);
    z-index: 1000;
}

.glass-effect-footer {
        background-color: rgba(68, 180, 176, 0.8) !important;
        backdrop-filter: blur(10px) !important;
        border-bottom: 1px solid rgba(68, 180, 176, 0.9) !important;
        z-index: 1000 !important;
        transition: background-color 0.5s ease, backdrop-filter 0.5s ease, border-bottom 0.5s ease !important;
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


#loader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #fff;
    z-index: 1000; 
}


#loader {
    border: 16px solid #f3f3f3;
    border-top: 16px solid #67C1BE; 
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite; 
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}


@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}


.loaded #loader-wrapper {
    display: none;
}


            </style>
    </head>
    <body class="font-sans antialiased">

<div id="loader-wrapper">
    <div id="loader"></div>
</div>

        <div class="bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @if(session()->has('message'))
            <div id="action-message" class="fixed show text-black bottom-4 right-4 bg-green-500 px-4 py-2 rounded-md shadow-md">
                {{ session('message') }}
            </div>
        @endif
        @include('layouts.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>// Rimuovi la classe "loaded" dal body quando la pagina inizia a caricare
document.body.classList.remove('loaded');

// Aggiungi un event listener per il caricamento completo della pagina
window.addEventListener('load', function() {
    // Aggiungi la classe "loaded" al body quando la pagina è completamente caricata
    document.body.classList.add('loaded');
});
</script>
        @stack('scripts')
    </body>
</html>
