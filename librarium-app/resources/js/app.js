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
        if(filterSelect.value === "all") {
            shownbooks.classList.remove("d-none");
            searchResultsArea.classList.add("d-none");
        } else {
            handleSearch(parseInt(filterSelect.value) || filterSelect.value);
        }

    });


    // Funzione per effettuare la ricerca
    function handleSearch(value) {
        console.log(value);
        if (value.length > 2 || typeof value === "number") {
            searchResultsArea.classList.remove("d-none");
            shownbooks.classList.add("d-none");
            displayBooksArea.innerHTML = "";
            document.querySelector(".cap").innerText="";
            fetchBooks(value);

        } else {
            searchResultsArea.classList.add("d-none");
            shownbooks.classList.remove("d-none");
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
                            <a href="/books/${book.id}" class="btn btn-outline-info">Maggiori Informazioni</a>
                        </div>
                    </div>
                </div>
            `;
        });
    }
    
    function showAdminBooks(books, term) {
        typeof term === "string" ? document.querySelector(".cap").innerText='Risultati di: "'+ term  +'"': document.querySelector(".cap").innerText='';
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
                    <a href="/book/${book.id}"><button class="btn btn-outline-info">Dettaglio</button></a>
                    <a href="/book/${book.id}/edit"><button class="btn btn-outline-info mt-4 mb-4">Modifica</button></a>
                    <button class="btn btn-outline-danger bigCancel">Cancella</button>

                </div>
            </div>
            `;
        })
    }

    document.querySelectorAll(".bigCancel").foreach(element => element.addEventListener("click", function (event) {
        event.preventDefault();
        console.log("ciao");
        confirm("Sei sicuro di voler eliminare questo libro?") && deleteBook(this.dataset.id);
    }));
    
    function deleteBook(id) {
        fetch('http://127.0.0.1:8000/api/books/' + id, {
            method: 'DELETE',
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            }
        })
        .then(response => response.json())
        .then(json => {
            console.log(json);
            window.location.reload();
        })
        .catch(error => {
            console.error('Errore durante la richiesta:', error);
        });
    }
});

