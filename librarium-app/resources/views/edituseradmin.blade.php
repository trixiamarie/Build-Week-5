<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifica Utente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route('book.create')}}"><button type="button" class="btn btn-outline-info">Crea Libro</button"></a>
                <a href="{{route('author.create')}}"><button type="button" class="btn btn-outline-info">Crea Autore</button"></a>
                <a href="{{route('author.index')}}"><button type="button" class="btn btn-outline-info">Tutti gli autori</button"></a>
                <a href="{{route('user.index')}}"><button type="button" class="btn btn-outline-info">Tutti gli utenti</button"></a>
            </div> -->

            <form method="POST" action="{{ route('user.update', $user->id) }}" class="w-full px-4 py-6">
                @csrf
                @method('PUT')

                <!-- Campo Nome -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('name')
                    <span role="alert" class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Cognome -->
                <div class="mb-4">
                    <label for="lastname" class="block text-sm font-medium text-gray-700">Cognome</label>
                    <input id="lastname" type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('lastname')
                    <span role="alert" class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Città -->
                <div class="mb-4">
                    <label for="city" class="block text-sm font-medium text-gray-700">Città</label>
                    <input id="city" type="text" name="city" value="{{ old('city', $user->city) }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('city')
                    <span role="alert" class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Data di Nascita -->
                <div class="mb-4">
                    <label for="dateofbirth" class="block text-sm font-medium text-gray-700">Data di Nascita</label>
                    <input id="dateofbirth" type="date" name="dateofbirth" value="{{ old('dateofbirth', $user->dateofbirth) }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('dateofbirth')
                    <span role="alert" class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @error('email')
                    <span role="alert" class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Ruolo -->
                <div class="mb-4">
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

                <!-- Pulsante di Invio -->
                <div>
                    <button type="submit" class="btn btn-outline-info">
                        Salva Modifiche
                    </button>
                </div>
            </form>


        </div>
    </div>
</x-app-layout>