import "./bootstrap";

import Alpine from "alpinejs";



window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const actionMessage = document.getElementById("action-message");

    if (actionMessage) {
        setTimeout(function () {
            actionMessage.classList.remove("show");
        }, 5000);

        setTimeout(function () {
            actionMessage.remove();
        }, 3500);
    }
});

document.addEventListener("DOMContentLoaded", function () {
    
    const shownbooks = document.querySelector(".shownBooks");
    const searchResultsArea = document.querySelector(".searchResultsArea");
    const displayBooksArea = document.querySelector(".displayBooksArea");
    const filterSelect = document.querySelector(".filterSelect");
    const searchInput = document.querySelector(".search");
    const pagineBtn = document.querySelector(".pagineBtn");

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    // Funzione per gestire la pressione del tasto "Enter" nel campo di ricerca
    
    searchInput.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            filterSelect ? filterSelect.value = "all" :'';
            handleSearch(searchInput.value.trim());
            searchInput.value = "";

        }
    });

    // Event listener per il cambio di selezione nel campo di filtro
    
    filterSelect && filterSelect.addEventListener("change", function () {
        searchInput.value = "";
        handleSearch(parseInt(filterSelect.value) || filterSelect.value);
    });


    // Funzione per effettuare la ricerca
    function handleSearch(value) {
        console.log(value);
        if (value.length > 2 || typeof value === "number") {
            searchResultsArea.classList.remove("d-none");
            shownbooks.classList.add("d-none");
            pagineBtn.classList.add("d-none");
            displayBooksArea.innerHTML = "";
            document.querySelector(".cap").innerText="";
            window.location.pathname == '/author' ? fetchAuthors(value) : fetchBooks(value);

        } else {
            searchResultsArea.classList.add("d-none");
            shownbooks.classList.remove("d-none");
            pagineBtn.classList.remove("d-none");
        }
    }

    // Funzione per effettuare la richiesta Fetch dei libri
    async function fetchBooks(term) {
        await fetch('http://127.0.0.1:8000/api/books?search=' + term, {
                method: 'GET',
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                }
            })
            .then(response => response.json())
            .then(json => {
                console.log(json);
                if(window.location.pathname == '/dashboard') {
                    showBooks(json, term);
                } else if(window.location.pathname == '/book') { 
                    showAdminBooks(json, term);
                }
            })
            .catch(error => {
                console.error('Errore durante la richiesta:', error);
            });
    }

    async function fetchAuthors(term) {
        await fetch('http://127.0.0.1:8000/api/authors?search=' + term, {
                method: 'GET',
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                }
            })
            .then(response => response.json())
            .then(json => {
                console.log(json);
                showAuthors(json, term);
            })
            .catch(error => {
                console.error('Errore durante la richiesta:', error);
            });
    }
    // Funzione per mostrare i libri nella pagina
    function showBooks(books, term) {
        typeof term === "string" ? document.querySelector(".cap").innerText='Risultati di: "'+ term  +'"': document.querySelector(".cap").innerText='';
        if (books.length === 0) {
            displayBooksArea.innerHTML = "<h3 class='h3'>Nessun libro trovato</h3>";
            return;
        }
        books.forEach(book => {
            displayBooksArea.innerHTML += `
                <div class="col">
                    <div class="card h-100">
                        <img src="${book.cover}" class="card-img-top" alt="${book.title}">
                        <div class="card-body">
                            <h5 class="card-title text-white fw-bold" style="font-size: 3dvh;">${book.title}</h5>
                            <p class="card-text text-white py-3 fw-bold">${book.authors.name} ${book.authors.lastname}</p>
                            <p class="card-text text-white pb-3">${book.plot}</p>
                            <a href="/book/${book.id}" class="btn btn-outline-info">Maggiori Informazioni</a>
                        </div>
                    </div>
                </div>
            `;
        });
    }

    
    function showAdminBooks(books, term) {
        typeof term === "string" ? (document.querySelector(".cap").innerText = 'Risultati di: "' + term + '"') : (document.querySelector(".cap").innerText = '');
        if (books.length === 0) {
            displayBooksArea.innerHTML = "<h3 class='h3'>Nessun libro trovato</h3>";
            return;
        }
        books.forEach(book => {
            displayBooksArea.innerHTML += `
                <div class="p-6 bg-white border-b border-gray-200 d-flex justify-content-between align-items-center" style="background-color: ${book.color};">
                    <div class="bg-white  col-sm-2 align-middle d-flex justify-content-center ">
                        <img src="${book.cover}" alt="Cover" class="" style="height: 10rem;">
                    </div>
    
                    <div class="p-6 bg-white col-sm-4 ">
                        <p><strong>Titolo:</strong>: ${book.title}</p>
                        <p><strong>Data di pubblicazione:</strong> ${book.released}</p>
                        <p><strong>Editore:</strong> ${book.publisher}</p>
                        <p><strong>ISBN:</strong> ${book.isbn}</p>
                        <p><strong>Numero di copie disponibili:</strong> ${book.copies}</p>
    
                    </div>
    
                    <div class="p-6 bg-white col-sm-4">
                        <p><strong>Trama:</strong> ${book.plot}</p>
                    </div>
    
                    <div class="p-6 bg-white col-sm-2 d-flex flex-column align-items-center">
                        <a href="/book/${book.id}"><button class="btn btn-custom">Dettaglio</button></a>
                        <a href="/book/${book.id}/edit"><button class="btn btn-custom mt-4 mb-4">Modifica</button></a>
                        <form action="/book/${book.id}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="${csrfToken}">
                            <button type="submit" class="btn btn-customG" onclick="return confirm('Sei sicuro di voler eliminare questo libro?')">Cancella</button>
                        </form>
    
                    </div>
                </div>
            `;
        });
    }

    function showAuthors(authors, term) {
        typeof term === "string" ? (document.querySelector(".cap").innerText = 'Risultati di: "' + term + '"') : (document.querySelector(".cap").innerText = '');
        if (authors.length === 0) {
            displayBooksArea.innerHTML = "<h3 class='h3'>Nessun autore trovato</h3>";
            return;
        }
        authors.forEach(author => {
            displayBooksArea.innerHTML += `
            <div class="card p-2 mb-2 d-flex flex-column justify-content-evenly align-items-center" style="width: 20rem; height:30rem;">
                <div class="text-center">
                    <p class="fw-bold fs-3">${author.pseudonym}</p>
                    <div style="width: 10rem; height: 10rem; border-radius: 50%; overflow: hidden; border: 0.5rem solid #9DBDB6;" class="text-center">
                        <img src="${author.avatar}" alt="Descrizione dell'immagine" style="width: 100%; height: 100%;">
                    </div>
                </div>
                <div>
                    <p class=""><strong>ID:</strong>${author.id}</p>
                    <p class=""><strong>Nome:</strong>${author.name}</p>
                    <p class=""><strong>Cognome:</strong> ${author.lastname}</p>
                    <p class=""><strong>Pseudonimo:</strong> ${author.pseudonym}</p>
                    <p class=""><strong>Data di nascita:</strong> ${author.birthday}</p>
                    <p class=""><strong>Città:</strong> ${author.city}</p>
                    <p class=""><strong>N. libri pubblicati:</strong> ${author.books_count}</p>
                </div>
    
                <div class="d-flex flex-wrap justify-content-between mt-3">
                    <a href="/author/${author.id}"><button class="btn btn-custom m-1">Dettaglio</button></a>
                    <a href="/author/${author.id}/edit"><button class="btn btn-custom m-1">Modifica</button></a>
                    <form action="/author/${author.id}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="${csrfToken}">
                        <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare?')" class="btn btn-customG m-1">Cancella</button>
                    </form>
                </div>
            </div>
            `;
        });
    }
});

