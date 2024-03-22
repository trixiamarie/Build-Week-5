<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Author') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('author.update', $author) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="name" id="name" value="{{ $author->name }}" autocomplete="given-name" placeholder="First Name"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" name="lastname" id="lastname" value="{{ $author->lastname }}" autocomplete="family-name"
                                placeholder="Last Name"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="pseudonym" class="block text-sm font-medium text-gray-700">Pseudonym</label>
                            <input type="text" name="pseudonym" id="pseudonym" value="{{ $author->pseudonym }}" placeholder="Pseudonym"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="birthday" class="block text-sm font-medium text-gray-700">Birthday</label>
                            <input type="date" name="birthday" id="birthday" value="{{ $author->birthday }}" placeholder="Birthday"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" name="city" id="city" value="{{ $author->city }}" placeholder="City"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div class="col-span-2">
                            <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                            <textarea id="bio" name="bio" rows="3"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                placeholder="Enter biography">{{ $author->bio }}</textarea>
                        </div>
                        <div>
                            <label for="avatar" class="block text-sm font-medium text-gray-700">Avatar URL</label>
                            <input type="text" name="avatar" id="avatar" value="{{ $author->avatar }}" placeholder="Avatar URL" 
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                <div class="mt-6">
                    <button type="submit" 
                        class="w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">
                            Save Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>