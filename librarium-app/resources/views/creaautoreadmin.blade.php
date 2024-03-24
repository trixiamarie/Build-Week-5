<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crea Autore') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
    <div class="md:flex">
        <div class="w-full px-4 py-6">
            <form method="POST" action="{{ route('author.store') }}">
                @csrf
                @method('POST')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                        <input type="text" name="name" id="name" autocomplete="given-name" placeholder="Nome"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="lastname" class="block text-sm font-medium text-gray-700">Cognome</label>
                        <input type="text" name="lastname" id="lastname" autocomplete="family-name"
                            placeholder="Cognome"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="pseudonym" class="block text-sm font-medium text-gray-700">Pseudonimo</label>
                        <input type="text" name="pseudonym" id="pseudonym" placeholder="Pseudonimo"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="birthday" class="block text-sm font-medium text-gray-700">Data di nascita</label>
                        <input type="date" name="birthday" id="birthday" placeholder="Data di nascita"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">Città</label>
                        <input type="text" name="city" id="city" placeholder="Città"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-2">
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea id="bio" name="bio" rows="3"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            placeholder="Enter biography"></textarea>
                    </div>
                    <div>
                        <label for="avatar" class="block text-sm font-medium text-gray-700">Avatar URL</label>
                        <input type="text" name="avatar" id="avatar" placeholder="Avatar URL"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit"
                        class="btn btn-outline-info">
                        Crea
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

                
              
            </div>
        </div>
    </div>
</x-app-layout>