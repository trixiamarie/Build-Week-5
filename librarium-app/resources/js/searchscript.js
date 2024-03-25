// import { axios } from "axios";


// document.addEventListener("DOMContentLoaded", function () {
//     const searchInput = document.getElementById("search");
//     const searchResults = document.getElementById("searchResults");

//     searchInput.addEventListener("input", function () {
//         console.log(searchInput.value);
//         const searchTerm = searchInput.value;
//         // if (searchTerm.trim() === "") {
//         //     searchResults.innerHTML = "";
//         //     return;
//         // }
//         axios.get('http://127.0.0.1:8000/api/books?search=' + searchTerm)
//         .then(response => {
//             console.log(response.data);
//         })
//         .catch(error => {
//         console.error('Errore durante la richiesta:', error);
//         });

//     });
// });