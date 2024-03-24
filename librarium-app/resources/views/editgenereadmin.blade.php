<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifica Genere') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                    <div class="md:flex">
                        <div class="w-full px-4 py-6">
                            <div class="md:flex">
                                <div class="w-full px-4 py-6">
                                    <div class="md:flex">
                                        <div class="w-full px-4 py-6">

                                            <form action="{{ route('genre.update', $genre->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                                                        <input type="text" name="name" id="name" value="{{ $genre->name }}" placeholder="Nome" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                </div>
                                                <div class="mt-6">
                                                    <button type="submit" class="btn btn-outline-info">Salva Modifiche</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>