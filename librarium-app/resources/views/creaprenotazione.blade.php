<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prenotazione di') }} {{$book->title}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-center m-3">
                        <img src="{{$book->cover}}" style="height:10rem;">
                        <div class="m-3">
                            <p>Titolo: {{$book->title}}</p>
                            <p>Autore: {{$book->authors->pseudonym}}</p>
                            <p>Editore: {{$book->publisher}}</p>
                        </div>
                    </div>


                    <form action="{{ route('booking.store') }}" method="POST" class="bg-white  px-8 pt-6 pb-8 mb-4 mx-4">
                        @csrf

                        <div class="mb-4 hidden">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="user">Utente</label>
                            <input style="width:10rem;" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user" name="user" type="text" value="{{$user}}" readonly>
                        </div>

                        <div class="mb-4 hidden">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="book">Libro</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="book" name="book" type="text" value="{{$book->id}}" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="collectiondate">Data di ritiro</label>
                            <input class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="collectiondate" name="collectiondate" type="date" min="{{ \Carbon\Carbon::tomorrow()->format('Y-m-d') }}">
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="btn btn-outline-info">Prenota</button>
                        </div>
                    </form>
                </div>

                <div class="m-3">
                    <h1 class="text-center fs-3 my-3">Regole di Prenotazione dei Libri</h1>
                    <p><strong>Eleggibilità alla Prenotazione:</strong> La prenotazione dei libri è aperta a tutti i membri registrati della biblioteca. È necessario essere in regola con tutte le eventuali multe pendenti o libri in ritardo prima di effettuare una nuova prenotazione.</p>

                    <p><strong>Numero Massimo di Prenotazioni:</strong> Ogni utente può avere un numero massimo di prenotazioni attive contemporaneamente. Questo limite può variare in base alla politica della biblioteca e al tipo di abbonamento dell'utente.</p>

                    <p><strong>Prenotazione Online o Presso la Biblioteca:</strong> Le prenotazioni possono essere effettuate sia online attraverso il portale della biblioteca che di persona presso la biblioteca stessa.</p>

                    <p><strong>Tempo di Prenotazione:</strong> Gli utenti possono prenotare un libro per un periodo di tempo specifico, generalmente compreso tra 1 e 4 settimane, a discrezione della biblioteca. Il periodo di prenotazione può essere prolungato in base alla disponibilità del libro e alle politiche della biblioteca.</p>

                    <p><strong>Ritiro dei Libri Prenotati:</strong> Una volta notificati tramite e-mail o altro mezzo, gli utenti devono ritirare il libro prenotato entro un determinato periodo di tempo. In caso di mancato ritiro entro il termine specificato, la prenotazione potrebbe essere annullata e il libro messo nuovamente a disposizione degli altri utenti.</p>

                    <p><strong>Prenotazioni Prioritarie:</strong> In alcuni casi, determinati libri possono essere soggetti a prenotazioni prioritarie per scopi didattici o altri motivi. In tali casi, la biblioteca potrebbe limitare il numero di prenotazioni attive per un singolo libro o applicare regole speciali per la prenotazione e il ritiro.</p>

                    <p><strong>Politiche di Annullamento:</strong> Gli utenti possono annullare una prenotazione in qualsiasi momento prima del ritiro del libro. Tuttavia, è importante segnalare tempestivamente l'annullamento per consentire alla biblioteca di rendere disponibile il libro ad altri utenti.</p>

                    <p><strong>Prenotazione di Libri Non Disponibili:</strong> Nel caso in cui un libro non sia attualmente disponibile in biblioteca, gli utenti possono comunque prenotarlo e verranno informati non appena il libro sarà nuovamente disponibile.</p>

                    <p><strong>Restituzione dei Libri Prenotati:</strong> I libri prenotati devono essere restituiti alla biblioteca entro la data di scadenza specificata durante il processo di prenotazione. Le multe possono essere applicate per ogni giorno di ritardo nella restituzione.</p>

                    <p><strong>Conformità alle Regole di Utilizzo della Biblioteca:</strong> Gli utenti sono tenuti a rispettare tutte le regole e le politiche della biblioteca durante il processo di prenotazione e utilizzo dei libri. L'abuso o la violazione delle regole possono comportare la sospensione o la revoca dei privilegi di prenotazione e l'applicazione di altre sanzioni disciplinari.</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>