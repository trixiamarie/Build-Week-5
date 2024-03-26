<style>
    .divider-vertical {
        display: flex;
        align-items: center;
    }

    .divider-vertical-line {
        width: 2px;
        height: 50px;
        background-color: rgba(255, 255, 255, 0.5);
    }

    @media (max-width: 768px) {
        .divider-vertical-line {
            display: block;
            width: 100%;
            height: 2px;
            margin: 15px 0;
        }

        h5 {
            font-weight: bold;
        }

        .social-icons {
            display: flex;
            justify-content: space-around;
        }
    }
</style>

<footer class="glass-effect-footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <a href="{{ route('dashboard') }}" style="color: #ffffff !important;">
                    <img src="{{ asset('img/logowhite.png') }}" alt="Logo" style="height:7rem;" class="mb-5">
                </a>
                <h5 class="text-white mb-4">Librarium</h5>
                <p class="text-white">Benvenuti alla nostra libreria virtuale! Esplora la vasta selezione di libri e lasciati ispirare.</p>
            </div>
            <div class="col-12 col-md-1 text-center divider-vertical">
                <div class="divider-vertical-line"></div>
            </div>
            <div class="col-12 col-md-3">
                <h5 class="text-white mb-4">Contatti</h5>
                <p class="text-white">Indirizzo: Via delle Librerie, 123<br>Città Libra, LB</p>
                <p class="text-white">Telefono: +123 456 7890</p>
                <p class="text-white">Email: info@librarium.com</p>
                <h5 class="text-white mb-4 mt-3">Orari</h5>
                <p class="text-white">Lunedì: 09:00 - 18:00
                    </br> Martedì: 09:00 - 18:00
                    </br> Mercoledì: 09:00 - 18:00
                    </br> Giovedì: 09:00 - 20:00
                    </br> Venerdì: 09:00 - 20:00
                    </br> Sabato: 10:00 - 16:00
                    </br> Domenica: Chiuso</p>

            </div>
            <div class="col-12 col-md-1 text-center divider-vertical">
                <div class="divider-vertical-line"></div>
            </div>
            <div class="col-12 col-md-3">
                <h5 class="text-white mb-4">Seguici</h5>
                <ul class="list-unstyled mb-0 social-icons">
                    <li><a href="#"><i class="bi bi-facebook text-white"></i></a></li>
                    <li><a href="#"><i class="bi bi-twitter text-white"></i></a></li>
                    <li><a href="#"><i class="bi bi-instagram text-white"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center pt-6">
                <p class="text-white">© 2024 Librarium. Tutti i diritti riservati.</p>
            </div>
        </div>
    </div>
</footer>