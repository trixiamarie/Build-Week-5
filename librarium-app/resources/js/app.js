import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    const actionMessage = document.getElementById('action-message');

    if (actionMessage) {
        setTimeout(function() {
            actionMessage.classList.remove('show');
        }, 5000); 

        setTimeout(function() {
            actionMessage.remove();
        }, 3500);
    }
});
