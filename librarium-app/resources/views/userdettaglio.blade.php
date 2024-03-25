
<style>

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
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{$user -> name}} {{$user -> lastname}}
        </h2>
    </x-slot>

    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="glass-effect-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="grid grid-cols-12">
                    <div class="col-span-4">
                        <p><strong>Nome:{{$user->name}}</strong></p>
                        <p><strong>Cognome:{{$user->lastname}}</strong></p>
                    </div>
                    <div class="col-span-4">
                        <p><strong>Città:</strong> {{$user->city}}</p>
                        <p><strong>Data di nascita:</strong> {{$user->dateofbirth}}</p>
                    </div> 
                    <div class="col-span-4">   
                        <p><strong>Email:</strong> {{$user->email}}</p>
                        <p><strong>Ruolo:</strong> 
                            @if ($user->role_id == 1)
                                Admin
                            @elseif ($user->role_id == 2)
                                User
                            @else
                                Unknown
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class=" d-flex flex-column align-items-center">
                <a href="{{route('user.edit',['user' => $user])}}">
                    <button type="button" class="btn btn-custom" style="width: 200px;">Modifica</button>
                </a>
                <form method="POST" action="{{route('user.destroy',['user' => $user])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-customG" style="width: 200px;">Elimina</button>
                </form>
            </div>
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


