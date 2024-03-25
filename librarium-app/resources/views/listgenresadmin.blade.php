<style>
  .btn-custom {
      background-color: white !important;
      color: #44b4b0 !important;
      transition: background-color 1s ease !important;
      transition: color 1s ease !important;
      font-family: 'Silka', sans-serif !important;
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
      <h2 class="font-semibold text-xl text-gray-800 leading-tight  inline-block">
          {{ __('Generi') }}
      </h2>
      <a href="{{route('genre.create')}}"><button type="button" class="btn btn-custom  float-end">Crea Genere</button"></a>
  </x-slot>




  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="glass-effect-white px-6 overflow-hidden shadow-sm sm:rounded-lg">
              <div>
                  @foreach ($genres as $genre)
                  <div class="d-flex justify-content-between border-b border-gray-200 shadow-sm sm:rounded-lg">
                  <p class="p-6 fw-bold ">{{$genre->name}}</p>
                  <div class="btn-group align-items-center" role="group">
                  <a href="{{route('genre.show', ['genre' => $genre])}}"><button class="btn btn-custom me-3">Dettaglio</button></a>
                  <a href="{{route('genre.edit', ['genre'=>$genre])}}"><button class="btn btn-custom me-3">Modifica</button></a>
                  <form action="{{route('genre.destroy',['genre'=>$genre])}}" method="POST" >
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-customG mt-3 me-3">Cancella</button>
                  </form>
                  </div>
                  </div>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
</x-app-layout>