<style>
   .btn-custom {
       margin-top: 20px !important;
       background-color: white !important;
       color: #44b4b0 !important;
       transition: background-color 1s ease, color 1s ease !important;
       font-family: 'Silka', sans-serif !important;
   }

   .glass-effect-white {
    background-color: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(10px);
    border-radius: 1dvh;
    border: 1px solid rgba(255, 255, 255, 0.6);
    z-index: 1000;
}
   .btn-custom:hover {
       color: white !important;
       background-color: #44b4b0 !important;
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
           {{ __('Dettaglio Genere') }}
       </h2>
   </x-slot>


   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="glass-effect-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900 text-center">
                   <p class="fw-bold">{{$genre->name}}</p>
               </div>
               <div class="d-flex justify-content-center flex-column align-items-center">
                   <a href="{{ route('genre.edit', ['genre' => $genre]) }}" class="btn btn-custom" style="width: 200px !important;">Modifica</a>
                   <form action="{{ route('genre.destroy', ['genre' => $genre->id] ) }}" method="POST">
                       @csrf
                       @method('DELETE')
                       <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare?')" class="btn btn-customG" style="width: 200px !important;">Elimina</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</x-app-layout>