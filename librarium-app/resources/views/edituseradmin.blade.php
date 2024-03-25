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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifica') }} {{$user -> name}} {{$user -> lastname}}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <form method="POST" action="{{ route('user.update', $user->id) }}" class="w-full px-4 py-6 glass-effect-white overflow-hidden shadow-sm sm:rounded-lg">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">
               <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('name')
                    <span role="alert" class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="lastname" class="block text-sm font-medium text-gray-700">Cognome</label>
                    <input id="lastname" type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('lastname')
                    <span role="alert" class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="dateofbirth" class="block text-sm font-medium text-gray-700">Data di Nascita</label>
                    <input id="dateofbirth" type="date" name="dateofbirth" value="{{ old('dateofbirth', $user->dateofbirth) }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('dateofbirth')
                    <span role="alert" class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="city" class="block text-sm font-medium text-gray-700">Città</label>
                    <input id="city" type="text" name="city" value="{{ old('city', $user->city) }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('city')
                    <span role="alert" class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('email')
                    <span role="alert" class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4 ">
                    <label for="role" class="block text-sm font-medium text-gray-700">Ruolo</label>
                    <select id="role" name="role" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->role }}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <span role="alert" class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-center mt-6">
                <button type="submit" class="btn btn-custom">
                    Salva Modifiche
                </button>
            </div>
        </form>
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