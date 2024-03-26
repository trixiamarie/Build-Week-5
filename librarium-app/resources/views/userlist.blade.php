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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Utenti') }}
        </h2>
        <a href="{{route('user.create')}}"><button type="button" class="btn btn-custom float-end">Crea Utente</button"></a>
    </x-slot>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="glass-effect-white px-6 overflow-hidden shadow-sm sm:rounded-lg">
            <ul class="list-none">
                <li class="py-3 ">
                    <div class="grid grid-cols-10 gap-3">
                        <div class="col-span-1 font-bold">Nome</div>
                        <div class="col-span-1 font-bold">Cognome</div>
                        <div class="col-span-2 font-bold">E-mail</div>
                        <div class="col-span-1 font-bold">Città</div>
                        <div class="col-span-2 font-bold">Data di Nascita</div>
                        <div class="col-span-1 font-bold">Ruolo</div>
                        <div class="col-span-1"></div>
                        <div class="col-span-1"></div>
                    </div>
                </li>
                @foreach ($users as $user)
                <li class="py-3  ">
                    <div class="grid grid-cols-10 gap-3 border-b border-gray-200 shadow-sm sm:rounded-lg px-3">
                        <div class="col-span-1">{{$user->name}}</div>
                        <div class="col-span-1">{{$user->lastname}}</div>
                        <div class="col-span-2">{{$user->email}}</div>
                        <div class="col-span-1">{{$user->city}} </div>
                        <div class="col-span-2">{{$user->dateofbirth}}</div>
                        <div class="col-span-1">@if ($user->role_id == 1)
                    Admin
                @elseif ($user->role_id == 2)
                    User
                @else
                    Unknown
                @endif</div>
                        <div class="col-span-1 mb-2"><a href="{{route('user.show',['user' => $user])}}"><button type="button" class="btn btn-custom">Dettagli</button></a></div>
                        <div class="col-span-1 mb-2"><a href="{{route('user.edit',['user' => $user])}}"><button type="button" class="btn btn-custom">Modifica</button></a></div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

</x-app-layout>



    <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route('book.create')}}"><button type="button" class="btn btn-outline-info">Crea Libro</button"></a>
                <a href="{{route('author.create')}}"><button type="button" class="btn btn-outline-info">Crea Autore</button"></a>
                <a href="{{route('author.index')}}"><button type="button" class="btn btn-outline-info">Tutti gli autori</button"></a>
                <a href="{{route('user.index')}}"><button type="button" class="btn btn-outline-info">Tutti gli utenti</button"></a>
            </div> -->

          
