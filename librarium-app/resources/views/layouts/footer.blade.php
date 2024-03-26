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

    h5 {
            font-weight: bold !important;
        }

    .orari {
        margin-top: -23px;
    }

    @media (max-width: 768px) {
        .divider-vertical-line {
            display: block;
            width: 100%;
            height: 2px;
            margin: 15px 0;
        }

        img {
            max-height: 100px;
            margin: 0 auto;
        }

        .divider-vertical {
            padding-top: 10px;
            padding-bottom: 10px;
            max-width: 80%;
            margin: 0 auto;
        }

        .orari {
        margin-top: 0px;
    }
    }
</style>

<footer class="glass-effect-footer py-5">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-md-2">
                <a href="{{ route('dashboard') }}" style="color: #ffffff !important;">
                    <img src="{{ asset('img/logowhite.png') }}" alt="Logo">
                </a>
            </div>
            <div class="col-12 col-md-1 text-center divider-vertical">
                <div class="divider-vertical-line"></div>
            </div>
            <div class="col-md-2">
            <h5 class="text-white mb-4">Biblioteca online</h5>
                <p class="text-white">Benvenuti alla nostra biblioteca virtuale! Esplora la vasta selezione di libri e lasciati ispirare.</p>
            </div>
            <div class="col-12 col-md-1 text-center divider-vertical">
                <div class="divider-vertical-line"></div>
            </div>
            <div class="col-md-2 orari">
                <h5 class="text-white mb-4">Orari</h5>
                <p class="text-white">Lun - Ven: 09:00 - 18:00<br>Sab: 10:00 - 14:00<br>Dom: Chiuso</p>
            </div>
            <div class="col-12 col-md-1 text-center divider-vertical">
                <div class="divider-vertical-line"></div>
            </div>
            <div class="col-md-3">
                <h5 class="text-white mb-4">Contatti</h5>
                <p class="text-white">Indirizzo: Via delle Librerie, 123<br>Città Libra, LB</p>
                <p class="text-white">Telefono: +123 456 7890</p>
                <p class="text-white">Email: info@librarium.com</p>
            </div>
        </div>
        <div class="row mt-4 align-items-center">
        <div class="col-12 text-center pt-6">
                <h5 class="text-white mb-4">Seguici</h5>
                <ul class="list-unstyled mb-0 social-icons d-flex justify-content-center">
                    <li><a href="#"><i class="bi bi-facebook text-white px-6"></i></a></li>
                    <li><a href="#"><i class="bi bi-twitter text-white px-6"></i></a></li>
                    <li><a href="#"><i class="bi bi-instagram text-white px-6"></i></a></li>
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
