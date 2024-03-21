<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <p>{{$book}}</p>
                <p>{{$user}}</p>
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf

                    <div>
                        <input type="text" id="user" name="user" value="{{$user}}" >
                    </div>

                    <div>
                        <label for="book">Libro:</label>
                        <input type="text" id="book" name="book" value="{{$book -> id}}" >
                    </div>

                    <div>
                        <label for="book">Data di ritiro</label>
                        <input type="date" id="book" name="collectiondate">
                    </div>

                    <button type="submit">Prenota</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>