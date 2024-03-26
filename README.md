<p align="center">
  <img src="https://i.postimg.cc/d31Nsx7k/chrome-WUn5b-Z9-TGr.jpg" alt="Landing page"/>
</p>

# Gestionale Web per una Biblioteca Online

Il nostro progetto consiste in un gestionale web per una biblioteca online. Questo sistema offre diverse funzionalità sia per gli utenti che per gli amministratori.

## Funzionalità

### Registrazione
La registrazione crea automaticamente un utente con ruolo user.

### Lato Utente

#### Hero Section
La nostra hero section offre un'interfaccia accattivante per gli utenti mostrando gli ultimi libri aggiunti nel db.

#### Filtri dei Libri
Gli utenti possono filtrare i libri per genere e cercare per autore e titolo del libro.

#### Pagina Dettaglio Libro
Nella pagina dettaglio libro, abbiamo una colonna 'colors' in 'books' che usiamo per colorare alcune parti della pagina come lo sfondo della sezione autore. Quando una recensione è presente, mostra il parziale di modifica della recensione, già compilato con la recensione dell’utente. Se l’utente non ha ancora scritto nessuna recensione, mostra il parziale che crea una nuova recensione.

Tutte le recensioni dell’utente sono presenti nella pagina “Le mie recensioni” in ordine di creazione, dal più recente al meno recente, dove l’utente può modificare e cancellare la recensione.

Se la recensione viene modificata all’interno della pagina del libro, si reindirizza nella pagina del libro, altrimenti se viene modificato nella sezione “le mie recensioni” il redirect sarà nella pagina “le mie recensioni”.

Al di sotto ci sono due caroselli con i libri dello stesso autore e i libri dello stesso genere.

Se in database ci sono copie del libro, si può prenotare, altrimenti si vede il bottone disabilitato con su scritto “Prenotazione non disponibile”.

Quando prenoti il libro, si può prenotare solo dal giorno seguente, non dallo stesso giorno.

Una volta prenotato, si viene reindirizzati alla pagina “le mie prenotazioni” dove le prenotazioni sono in ordine dal più recente al più vecchio.

Nella pagina prenotazioni è visibile lo stato della prenotazione (Pending - Accetata - Rifiutata).

Tramite breeze l'utente può modificare il proprio profilo.

C'è un controllo dei ruoli per cui se si è un utente e si cerca di accedere alla parte dedicata agli admin, la sessione viene cancellata e si viene riportati al login.

### Lato Admin

#### Dashboard Admin
La dashboard admin mostra tutte le sezioni che si possono gestire.

Nella sezione utenti, si possono creare utenti, modificarli ed eliminarli. L’admin non può cambiare la password, ne tantomeno visualizzarla.

Nella sezione libri, l’admin può creare libri, modificarli e cancellarli. Nella stessa sezione si può fare la ricerca del libro per autore e per titolo del libro.

Nella sezione autori, si può creare l’autore, modificarlo, cancellarlo, e vedere i libri collegati all’autore.

Nella sezione generi si possono creare generi, modificarli ed eliminarli.

Nella sezione recensioni, si possono eliminare.

Nella sezione prenotazioni è possibile gestire le prenotazioni accettandole o rifiutandole oltre ad avere una lista.
