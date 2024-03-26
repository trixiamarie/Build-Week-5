<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $libri = [
            [
                'cover' => 'https://cdn.kobo.com/book-images/c9472126-7f96-402d-ba57-5ba4c0f4b238/353/569/90/False/nineteen-eighty-four-1984-george.jpg',
                'color' =>'#D21116',
                'title' => '1984',
                'released' => '1949-06-08',
                'publisher' => 'Secker & Warburg',
                'plot' => '1984 è un romanzo distopico di George Orwell pubblicato nel 1949. La storia è ambientata in un futuro distopico, in un mondo totalitario diviso in tre superstati.',
                'isbn' => 9780151010264,
                'author' => 1,
                'genre' => 1,
            ],
            [
                'cover' => 'https://m.media-amazon.com/images/I/71rfLwvICQL._SL1500_.jpg',
                'color' => '#5AC5F3',
                'title' => 'Animal Farm',
                'released' => '1945-08-17',
                'publisher' => 'Secker & Warburg',
                'plot' => 'Animal Farm è un romanzo satirico di George Orwell pubblicato nel 1945. Il libro riflette gli eventi che portarono alla Rivoluzione Russa e all\'era stalinista dell\'Unione Sovietica.',
                'isbn' => 9788807882101,
                'author' => 1,
                'genre' => 1,
            ],
            [
                'cover' => 'https://m.media-amazon.com/images/I/71EoYkXesEL._SL1500_.jpg',
                'color' => '#6D6842',
                'title' => 'Orgoglio e Pregiudizio',
                'released' => '1813-01-28',
                'publisher' => 'T. Egerton, Whitehall',
                'plot' => 'Orgoglio e pregiudizio è un romanzo di Jane Austen, pubblicato nel 1813. È considerato uno dei capolavori della letteratura inglese e un classico della letteratura mondiale.',
                'isbn' => 9788804681452,
                'author' => 2,
                'genre' => 8,
            ],
            [
                'cover' => 'https://m.media-amazon.com/images/I/81s2Njtv2oL._SL1500_.jpg
                ',
                'color' => '#364130',
                'title' => 'Emma',
                'released' => '1815-12-23',
                'publisher' => 'John Murray',
                'plot' => 'Emma è un romanzo di Jane Austen, pubblicato nel 1815. È un romanzo di crescita personale, ambientato nel periodo georgiano, e descrive la vita e le preoccupazioni di giovani donne in Inghilterra.',
                'isbn' => 9788804622684,
                'author' => 2,
                'genre' => 8,
            ],
            [
                'cover' => 'https://m.media-amazon.com/images/I/81uod0Mf4KL._SL1500_.jpg
                ',
                'color' => '#F70200',
                'title' => 'Harry Potter e la Pietra Filosofale',
                'released' => '1997-06-26',
                'publisher' => 'Bloomsbury',
                'plot' => 'Harry Potter e la Pietra Filosofale è il primo libro della serie di Harry Potter di J.K. Rowling. Il romanzo segue le avventure di Harry Potter, un giovane mago, e dei suoi amici Hermione Granger e Ron Weasley, durante il loro primo anno alla Scuola di Magia e Stregoneria di Hogwarts.',
                'isbn' => 9780747532743,
                'author' => 3,
                'genre' => 2,
            ],
            [
                'cover' => 'https://m.media-amazon.com/images/I/716aYxhlUiL._SL1500_.jpg',
                'color' => '#C39B55',
                'title' => 'Harry Potter e la Camera dei Segreti',
                'released' => '1998-07-02',
                'publisher' => 'Bloomsbury',
                'plot' => 'Harry Potter e la Camera dei Segreti è il secondo libro della serie di Harry Potter di J.K. Rowling. La trama segue le avventure di Harry Potter, un giovane mago, e dei suoi amici Hermione Granger e Ron Weasley, durante il loro secondo anno alla Scuola di Magia e Stregoneria di Hogwarts.',
                'isbn' => 9780747538493,
                'author' => 3,
                'genre' => 2,
            ],
            [
                'cover' => 'https://m.media-amazon.com/images/I/81sqPftaizL._SL1500_.jpg',
                'color' => '#929292',
                'title' => 'Addio alle armi',
                'released' => '1929-10-05',
                'publisher' => 'Charles Scribner\'s Sons',
                'plot' => 'Addio alle armi è un romanzo di Ernest Hemingway pubblicato nel 1929. Ambientato durante la prima guerra mondiale, il romanzo narra la storia di un giovane tenente americano che si innamora di un\'infermiera britannica durante il conflitto.',
                'isbn' => 9788845282404,
                'author' => 4, 
                'genre' => 4, 
            ],
            [
                'cover' => 'https://m.media-amazon.com/images/I/81Q5sYM4mQL._SL1500_.jpg',
                'color' => '#5483B9',
                'title' => 'Il vecchio e il mare',
                'released' => '1952-09-01',
                'publisher' => 'Charles Scribner\'s Sons',
                'plot' => 'Il vecchio e il mare è un romanzo di Ernest Hemingway pubblicato nel 1952. Il romanzo narra la storia di un anziano pescatore cubano e del suo lungo e solitario sforzo per catturare un gigantesco marlin nel Golfo del Messico.',
                'isbn' => 9788804482104,
                'author' => 4, 
                'genre' => 7, 
            ],
            [
                'cover' => 'https://m.media-amazon.com/images/I/71oWFPril4L._AC_UF1000,1000_QL80_.jpg',
                'color' => '#A41B23',
                'title' => 'It',
                'released' => '1986-09-15',
                'publisher' => 'Viking Press',
                'plot' => 'It è un romanzo horror di Stephen King pubblicato nel 1986. Il libro segue le vicende di un gruppo di bambini chiamati il "Club dei Perdenti" e le loro avventure con una creatura demoniaca che si manifesta principalmente sotto forma di un clown chiamato Pennywise.',
                'isbn' => 9780670813025,
                'author' => 5, 
                'genre' => 6, 
            ],
            [
                'cover' => 'https://m.media-amazon.com/images/I/61JZ-er-i5L._AC_UF1000,1000_QL80_.jpg',
                'color' => '#533D25',
                'title' => 'Il miglio verde',
                'released' => '1996-08-28',
                'publisher' => 'Scribner',
                'plot' => 'Il miglio verde è un romanzo di Stephen King pubblicato nel 1996. La storia è ambientata nella sezione E del braccio di morte della prigione di Cold Mountain negli anni \'30 e segue la vita dei detenuti e dei guardie carcerarie che vivono e lavorano lì.',
                'isbn' => 9788807812245,
                'author' => 5, 
                'genre' => 6, 
            ],
            [
                'cover' => 'https://m.media-amazon.com/images/I/517LFQ4m0DL.jpg',
                'color' => '#1D2248',
                'title' => 'Assassinio sull\'Orient Express',
                'released' => '1934-01-01',
                'publisher' => 'Collins Crime Club',
                'plot' => 'Assassinio sull\'Orient Express è un romanzo giallo di Agatha Christie pubblicato nel 1934. Il detective Hercule Poirot indaga su un omicidio avvenuto sul celebre treno Orient Express.',
                'isbn' => 9780062073501,
                'author' => 6, 
                'genre' => 4, 
            ],
            [
                'cover' => 'https://www.ibs.it/images/8054317086907_0_536_0_75.jpg',
                'color' => '#C93430',
                'title' => 'E poi non ne rimase nessuno',
                'released' => '1939-11-06',
                'publisher' => 'Collins Crime Club',
                'plot' => 'E poi non ne rimase nessuno è un romanzo giallo di Agatha Christie pubblicato nel 1939. Il romanzo segue le vicende di dieci personaggi invitati su un\'isola al largo della costa del Devon e misteriosamente uccisi uno dopo l\'altro.',
                'isbn' => 9788804685405,
                'author' => 6, 
                'genre' => 4, 
            ],
            [
                'cover' => 'https://cs.ilgiardinodeilibri.it/data/prod/orig/c/cinquanta-sfumature-grigio-2014.jpg?_=1594027950',
                'color' => '#4E667F',
                'title' => 'Cinquanta sfumature di grigio',
                'released' => '2011-06-20',
                'publisher' => 'Arrow Books',
                'plot' => 'Cinquanta sfumature di grigio è il primo romanzo della trilogia di E.L. James. La storia segue la relazione tra Anastasia Steele, una giovane studentessa universitaria, e Christian Grey, un affascinante e misterioso imprenditore.',
                'isbn' => 9788865085059,
                'author' => 7, 
                'genre' => 3, 
            ],
            [
                'cover' => 'https://www.oscarmondadori.it/content/uploads/2020/04/978880472929HIG-310x480.jpg?x89969',
                'color' => '#041C31',
                'title' => 'Cinquanta sfumature di nero',
                'released' => '2012-04-17',
                'publisher' => 'Arrow Books',
                'plot' => 'Cinquanta sfumature di nero è il secondo romanzo della trilogia di E.L. James. Il libro continua a seguire la relazione tra Anastasia Steele e Christian Grey mentre affrontano nuove sfide e segreti del loro passato.',
                'isbn' => 9788865088234,
                'author' => 7, 
                'genre' => 3, 
            ],

            [
                'cover' => 'https://m.media-amazon.com/images/I/71FZDMfeF6L._SY466_.jpg',
                'color' => '#a22720',
                'title' => 'Sulla strada',
                'released' => '1957-09-05',
                'publisher' => 'Viking Press',
                'plot' => 'Sal Paradise, un giovane scrittore, incontra Dean Moriarty, un carismatico e impulsivo ex detenuto, a New York. I due si legano immediatamente e decidono di intraprendere un viaggio attraverso il paese in cerca di avventure, libertà e significato.',
                'isbn' => 9780140042597,
                'author' => 17, 
                'genre' => 5, 
            ],

            [
                'cover' => 'https://m.media-amazon.com/images/I/61YrFZdddRL._SY466_.jpg',
                'color' => '#594679',
                'title' => 'I vagabondi del Dharma',
                'released' => '1958-07-21',
                'publisher' => 'Penguin',
                'plot' => 'Il romanzo racconta le esperienze di Kerouac sulla West Coast americana e in particolare del suo avvicinamento al Buddhismo, alla filosofia Zen e al Trascendentalismo.',
                'isbn' => 9780241348062,
                'author' => 17, 
                'genre' => 5, 
            ],

            [
                'cover' => 'https://m.media-amazon.com/images/I/718AI4cEYsL._SL1500_.jpg',
                'color' => '#e98f3a',
                'title' => 'La città e la metropoli',
                'released' => '1950-02-01',
                'publisher' => 'Harcourt Brace',
                'plot' => 'Due brevi racconti che mettono a confronto la vita nei quartieri cittadini, catturando frenesia ed energia delle strade e degli incontri casuali.',
                'isbn' => 9788804661283,
                'author' => 17, 
                'genre' => 5, 
            ],

            [
                'cover' => 'https://m.media-amazon.com/images/I/81hxQ+DlE3L._SL1500_.jpg',
                'color' => '#5789ba',
                'title' => 'Big Sur',
                'released' => '1962-01-01',
                'publisher' => 'Chronicle Books',
                'plot' => 'Il romanzo segue il personaggio di Jack Duluoz (alter ego di Kerouac) mentre cerca fuga e isolamento nella bellezza naturale di Big Sur, solo per essere affrontato dai propri demoni interiori e ansia.',
                'isbn' => 9780140168129,
                'author' => 17, 
                'genre' => 5, 
            ],

            [
                'cover' => 'https://m.media-amazon.com/images/I/81FFaSQRPTL._SL1500_.jpg',
                'color' => '#94786d',
                'title' => 'I sotterranei',
                'released' => '1958-01-01',
                'publisher' => 'Grove Press',
                'plot' => 'Il protagonista Leo Percepied, basato su Kerouac stesso, si innamora di Mardou Fox, una donna afroamericana. Il romanzo esplora temi di amore, identità e le sfide delle relazioni interrazziali negli USA degli anni 50.',
                'isbn' => 9780345271303,
                'author' => 17, 
                'genre' => 5, 
            ],
        ];


        foreach ($libri as $libro) {
            Book::create($libro);
        }
    }
}
