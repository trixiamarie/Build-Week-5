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
              
                <a href="{{route('book.edit',['book'=>$book])}}"><button type="button" class="btn btn-outline-info">Modifica</button></a>

                <form action="{{route('book.destroy',['book'=>$book])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Cancella</button>
                </form>
            </div>
        </div>
    </div>
    
</x-app-layout>