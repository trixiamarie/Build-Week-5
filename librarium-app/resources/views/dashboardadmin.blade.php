<style>
    .glass-effect-white {
    background-color: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(10px);
    border-radius: 1dvh;
    border: 1px solid rgba(255, 255, 255, 0.6);
    z-index: 1000;
}
  .btn-custom {
      background-color: white !important;
      color: #44b4b0 !important;
      transition: background-color 1s ease !important;
      transition: color 1s ease !important;
      font-family: 'Silka', sans-serif !important;
  }



.btn-customG {
    margin-top: 2dvh !important;
    background-color: #A9B2BB !important;
    color: white !important;
    transition: background-color 1s ease !important;
    tansition: color 1s ease !important;
    font-family: 'Silka', sans-serif !important;
}

.btn-customG:hover {
    color: white !important;
    background-color: #3d4145 !important;
}
  
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route('author.create')}}"><button type="button" class="btn btn-outline-info">Crea Autore</button"></a>
                <a href="{{route('author.index')}}"><button type="button" class="btn btn-outline-info">Gestisci Autori</button"></a>
            </div> -->
            <div class="d-flex flex-wrap justify-content-evenly">
               
                <a href="{{route('user.index')}}">
                    <div class="card m-4" style="width: 20rem; height:12rem; border:0.3rem solid #66C1BE; background-color:white; border-radius:1rem;">
                        <div class="card-body">
                            <h5 class="fs-1">Utenti</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Gestione</h6>
                        </div>
                        <div class="d-flex m-2 align-items-center justify-content-end">
                            <p>Vai</p>
                        <i class="bi bi-arrow-right-circle-fill fs-1 p-1 btn-custom"></i>
                    </div>
                    </div>
                </a>
                <a href="{{route('book.index')}}">
                    <div class="card m-4" style="width: 20rem; height:12rem; border:0.3rem solid #66C1BE; background-color:white; border-radius:1rem;">
                        <div class="card-body">
                            <h5 class="fs-1">Libri</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Gestione</h6>
                        </div>
                        <div class="d-flex m-2 align-items-center justify-content-end">
                            <p>Vai</p>
                        <i class="bi bi-arrow-right-circle-fill fs-1 p-1 btn-custom"></i>
                    </div>
                    </div>
                </a>
                <a href="{{route('author.index')}}">
                    <div class="card m-4" style="width: 20rem; height:12rem; border:0.3rem solid #66C1BE; background-color:white; border-radius:1rem;">
                        <div class="card-body">
                            <h5 class="fs-1">Autori</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Gestione</h6>
                        </div>
                        <div class="d-flex m-2 align-items-center justify-content-end">
                            <p>Vai</p>
                        <i class="bi bi-arrow-right-circle-fill fs-1 p-1 btn-custom"></i>
                    </div>
                    </div>
                </a>
               
                <a href="{{route('genre.index')}}">
                    <div class="card m-4" style="width: 20rem; height:12rem; border:0.3rem solid #66C1BE; background-color:white; border-radius:1rem;">
                        <div class="card-body">
                            <h5 class="fs-1">Generi</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Gestione</h6>
                        </div>
                        <div class="d-flex m-2 align-items-center justify-content-end">
                            <p>Vai</p>
                        <i class="bi bi-arrow-right-circle-fill fs-1 p-1 btn-custom"></i>
                    </div>
                    </div>
                </a>
                <a href="{{route('review.index')}}">
                    <div class="card m-4" style="width: 20rem; height:12rem; border:0.3rem solid #66C1BE; background-color:white; border-radius:1rem;">
                        <div class="card-body">
                            <h5 class="fs-1">Recensioni</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Gestione</h6>
                        </div>
                        <div class="d-flex m-2 align-items-center justify-content-end">
                            <p>Vai</p>
                        <i class="bi bi-arrow-right-circle-fill fs-1 p-1 btn-custom"></i>
                    </div>
                    </div>
                </a>
                <a href="{{route('booking.index')}}">
                    <div class="card m-4" style="width: 20rem; height:12rem; border:0.3rem solid #66C1BE; background-color:white; border-radius:1rem;">
                        <div class="card-body">
                            <h5 class="fs-1">Prenotazioni</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Gestione</h6>
                        </div>
                        <div class="d-flex m-2 align-items-center justify-content-end">
                            <p>Vai</p>
                        <i class="bi bi-arrow-right-circle-fill fs-1 p-1 btn-custom"></i>
                    </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</x-app-layout>