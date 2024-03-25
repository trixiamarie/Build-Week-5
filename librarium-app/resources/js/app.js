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
    if(window.location.pathname === "/dashboard") {
        
    
    const shownbooks = document.querySelector(".shownBooks");
    const searchResultsArea = document.querySelector(".searchResultsArea");
    const displayBooksArea = document.querySelector(".displayBooksArea");
    const filterSelect = document.querySelector(".filterSelect");
    const searchInput = document.querySelector("#search");

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    // Funzione per gestire la pressione del tasto "Enter" nel campo di ricerca
    
    searchInput.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            filterSelect.value = "all";
            handleSearch(searchInput.value.trim());

        }
    });

    // Event listener per il cambio di selezione nel campo di filtro
    
    filterSelect.addEventListener("change", function () {
        
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
                showBooks(json, term);
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

    }
});
