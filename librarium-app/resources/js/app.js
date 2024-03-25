import "./bootstrap";

import Alpine from "alpinejs";
import { axios } from "axios";


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

alert('ciao');
axios.get('http://127.0.0.1:8000/api/books')
.then(response => {
console.log(response.data);
})
.catch(error => {
console.error('Errore durante la richiesta:', error);
});