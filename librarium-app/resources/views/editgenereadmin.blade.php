<style>
   .glass-effect {
       background-color: rgba(33, 107, 90, 0.2) !important;
       backdrop-filter: blur(10px) !important;
       border-radius: 10px !important;
       border: 1px solid rgba(33, 107, 90, 0.3) !important;
       padding: 50px !important;
       z-index: 1000 !important;
   }


   .btn-custom {
       margin-top: 20px !important;
       background-color: white !important;
       color: #44b4b0 !important;
       transition: background-color 1s ease, color 1s ease !important;
       font-family: 'Silka', sans-serif !important;
   }


   .btn-custom:hover {
       color: white !important;
       background-color: #44b4b0 !important;
   }
</style>
<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Modifica Genere') }}
       </h2>
   </x-slot>


  
<div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="glass-effect overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900 text-center">
               </div>
               <div class="d-flex justify-content-center flex-column align-items-center text-center ">


                   <form action="{{ route('genre.update', $genre->id) }}" method="POST">
                                               @csrf
                                               @method('PUT')
                                               <div >
                                                   <div>
                                                       <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                                                       <input type="text" name="name" id="name" value="{{ $genre->name }}" placeholder="Nome" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                   </div>
                                               </div>
                                               <div class="mt-6">
                                                   <button type="submit" class="btn btn-custom"style="width: 200px !important;">Salva</button>
                                               </div>
                                           </form>
               </div>
           </div>
       </div>
   </div>
</x-app-layout>