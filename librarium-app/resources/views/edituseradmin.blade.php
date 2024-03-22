<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route('book.create')}}"><button type="button" class="btn btn-outline-info">Crea Libro</button"></a>
                <a href="{{route('author.create')}}"><button type="button" class="btn btn-outline-info">Crea Autore</button"></a>
                <a href="{{route('author.index')}}"><button type="button" class="btn btn-outline-info">Tutti gli autori</button"></a>
                <a href="{{route('user.index')}}"><button type="button" class="btn btn-outline-info">Tutti gli utenti</button"></a>
            </div>

            <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT')

                <!-- Campo Nome -->
                <div>
                    <label for="name">Nome</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                    @error('name')
                    <span role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Cognome -->
                <div>
                    <label for="lastname">Cognome</label>
                    <input id="lastname" type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}" required>
                    @error('lastname')
                    <span role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Città -->
                <div>
                    <label for="city">Città</label>
                    <input id="city" type="text" name="city" value="{{ old('city', $user->city) }}" required>
                    @error('city')
                    <span role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Data di Nascita -->
                <div>
                    <label for="dateofbirth">Data di Nascita</label>
                    <input id="dateofbirth" type="date" name="dateofbirth" value="{{ old('dateofbirth', $user->dateofbirth) }}" required>
                    @error('dateofbirth')
                    <span role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Email -->
                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                    <span role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Ruolo -->
                <div>
                    <label for="role">Ruolo</label>
                    <select id="role" name="role" required>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->role }}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <span role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Pulsante di Invio -->
                <div>
                    <button type="submit">Salva Modifiche</button>
                </div>
            </form>


        </div>
    </div>
</x-app-layout>