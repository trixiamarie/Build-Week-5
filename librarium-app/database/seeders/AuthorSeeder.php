<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $autori = [
            [
                'name' => 'George',
                'lastname' => 'Orwell',
                'pseudonym' => 'George Orwell',
                'birthday' => '1903-06-25',
                'city' => 'Motihari, India',
                'bio' => 'George Orwell è stato uno scrittore, giornalista e saggista britannico, noto per i suoi lavori di critica sociale e letteraria.',
                'avatar' => 'https://www.fanucci.it/cdn/shop/collections/GeorgeOrwell.jpg?v=1614872242',
            ],
            [
                'name' => 'Jane',
                'lastname' => 'Austen',
                'pseudonym' => 'Jane Austen',
                'birthday' => '1775-12-16',
                'city' => 'Steventon, Regno Unito',
                'bio' => 'Jane Austen è stata una scrittrice britannica, autrice di alcuni dei più famosi romanzi della letteratura inglese, tra cui "Orgoglio e pregiudizio" e "Emma".',
                'avatar' => 'https://www.thearslibrorum.com/wp-content/uploads/2023/02/Jane-Austen-1.webp',
            ],
            [
                'name' => 'Joanne',
                'lastname' => 'Rowling',
                'pseudonym' => 'J.K. Rowling',
                'birthday' => '1965-07-31',
                'city' => 'Yate, Regno Unito',
                'bio' => 'Joanne Rowling è una scrittrice, sceneggiatrice e produttrice cinematografica britannica. La sua fama è legata principalmente alla serie di romanzi di Harry Potter, che ha scritto firmandosi con lo pseudonimo J. K. Rowling, motivo per cui la scrittrice è spesso indicata erroneamente come "Joanne Kathleen Rowling".',
                'avatar' => 'https://m.media-amazon.com/images/S/amzn-author-media-prod/8cigckin175jtpsk3gs361r4ss.jpg',
            ],
            [
                'name' => 'Ernest',
                'lastname' => 'Hemingway',
                'pseudonym' => 'Ernest Hemingway',
                'birthday' => '1899-07-21',
                'city' => 'Oak Park, Illinois, USA',
                'bio' => 'Ernest Hemingway è stato uno scrittore e giornalista statunitense, autore di romanzi e racconti spesso ambientati in contesti di guerra o viaggi.',
                'avatar' => 'https://www.ilprimatonazionale.it/wp-content/uploads/2019/11/Hemingway.jpg',
            ],
            [
                'name' => 'Stephen',
                'lastname' => 'King',
                'pseudonym' => 'Stephen King',
                'birthday' => '1947-09-21',
                'city' => 'Portland, Maine, USA',
                'bio' => 'Stephen Edwin King è uno scrittore e sceneggiatore statunitense, uno dei più celebri autori di letteratura fantastica, in particolare horror, del XX e XXI secolo.',
                'avatar' => 'https://m.media-amazon.com/images/S/amzn-author-media-prod/fkeglaqq0pic05a0v6ieqt4iv5.jpg',
            ],
            [
                'name' => 'Agatha',
                'lastname' => 'Christie',
                'pseudonym' => 'Agatha Christie',
                'birthday' => '1890-09-15',
                'city' => 'Torquay, Regno Unito',
                'bio' => 'Agatha Mary Clarissa Miller, coniugata Christie, è stata una scrittrice e drammaturga britannica, autrice di numerosi romanzi polizieschi.',
                'avatar' => 'https://www.storicang.it/medio/2023/01/04/la-romanziera-fotografata-intorno-al-1925_c591cdc9_800x1079.jpg',
            ],
            [
                'name' => 'Erika',
                'lastname' => 'Mitchell',
                'pseudonym' => 'E.L. James',
                'birthday' => '1963-03-07',
                'city' => 'Londra, Regno Unito',
                'bio' => 'Erika Leonard Mitchell, meglio conosciuta con lo pseudonimo E.L. James, è una scrittrice britannica famosa per la serie di romanzi "50 sfumature di grigio".',
                'avatar' => 'https://images-na.ssl-images-amazon.com/images/S/amzn-author-media-prod/5n7cmacp6a43i0f5od69fl5105.jpg',
            ],
            [
                'name' => 'Haruki',
                'lastname' => 'Murakami',
                'pseudonym' => 'Haruki Murakami',
                'birthday' => '1949-01-12',
                'city' => 'Kyoto, Giappone',
                'bio' => 'Haruki Murakami è uno dei più celebri scrittori giapponesi contemporanei, autore di romanzi come "Norwegian Wood" e "1Q84".',
                'avatar' => 'https://images2.corriereobjects.it/methode_image/2019/01/25/LiberiTutti/Foto%20LiberiTutti%20-%20Trattate/murakami%20-U43480829739107NuH-U30901436519749n8C-1224x916@Corriere-Web-Sezioni-593x443.jpg?v=20190127163222',
            ],
            [
                'name' => 'Gabriel',
                'lastname' => 'García Márquez',
                'pseudonym' => 'Gabriel Garcìa Màrquez',
                'birthday' => '1927-03-06',
                'city' => 'Aracataca, Colombia',
                'bio' => 'Gabriel García Márquez è stato uno scrittore colombiano, premio Nobel per la letteratura nel 1982, famoso per romanzi come "Cent\'anni di solitudine" e "L\'amore ai tempi del colera".',
                'avatar' => 'https://www.ilcartello.eu/wp-content/uploads/2014/04/Gabriel-Garcia-Marquez.jpg',
            ],
            [
                'name' => 'Leo',
                'lastname' => 'Tolstoj',
                'pseudonym' => 'Leo Tolstoj',
                'birthday' => '1828-09-09',
                'city' => 'Yasnaya Polyana, Russia',
                'bio' => 'Lev Tolstoj è stato uno dei più grandi scrittori russi, celebre per opere come "Guerra e pace" e "Anna Karenina".',
                'avatar' => 'https://www.repstatic.it/content/nazionale/img/2018/11/17/213003654-0c78a6ac-87c9-4325-b759-7f96ccce2510.jpg',
            ],
            [
                'name' => 'Virginia',
                'lastname' => 'Woolf',
                'pseudonym' => 'Virgina Wolf',
                'birthday' => '1882-01-25',
                'city' => 'Londra, Regno Unito',
                'bio' => 'Virginia Woolf è stata una scrittrice britannica, considerata una delle più importanti del XX secolo, nota per opere come "La signora Dalloway" e "Al faro".',
                'avatar' => 'https://compass-media.vogue.it/photos/65b198709687033fdef68517/2:3/w_2560%2Cc_limit/Virginia%2520Woolf%2520(1).jpg',
            ],
            [
                'name' => 'Franz',
                'lastname' => 'Kafka',
                'pseudonym' => 'Franz Kafka',
                'birthday' => '1883-07-03',
                'city' => 'Praga, Impero austro-ungarico',
                'bio' => 'Franz Kafka è stato uno scrittore austro-boemo di lingua tedesca, noto per opere come "La metamorfosi" e "Il processo".',
                'avatar' => 'https://www.anarcopedia.org/images/thumb/5/5e/Kafka2.gif/300px-Kafka2.gif',
            ],
            [
                'name' => 'Fyodor',
                'lastname' => 'Dostoevskij',
                'pseudonym' => 'Fyodor Dostoevskij',
                'birthday' => '1821-11-11',
                'city' => 'Mosca, Russia',
                'bio' => 'Fëdor Dostoevskij è stato uno scrittore russo tra i più grandi della letteratura mondiale, noto per opere come "Delitto e castigo" e "I fratelli Karamazov".',
                'avatar' => 'https://www.illibraio.it/wp-content/uploads/2018/02/1Adostoev.jpg',
            ],
            [
                'name' => 'Miguel',
                'lastname' => 'de Cervantes',
                'pseudonym' => 'Miguel de Cervantes',
                'birthday' => '1547-09-29',
                'city' => 'Alcalá de Henares, Spagna',
                'bio' => 'Miguel de Cervantes è stato uno scrittore spagnolo, celebre per il suo romanzo "Don Chisciotte".',
                'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Cervantes_J%C3%A1uregui.jpg/1200px-Cervantes_J%C3%A1uregui.jpg',
            ],
            [
                'name' => 'Charles',
                'lastname' => 'Dickens',
                'pseudonym' => 'Charles Dickens',
                'birthday' => '1812-02-07',
                'city' => 'Portsmouth, Regno Unito',
                'bio' => 'Charles Dickens è stato uno scrittore e giornalista britannico, considerato uno dei più grandi romanzieri del XIX secolo, noto per opere come "Oliver Twist" e "Grandi speranze".',
                'avatar' => 'https://www.pausacaffeblog.it/wp/wp-content/uploads/2012/02/charles-dickens-800-.jpg',
            ],
            [
                'name' => 'Mark',
                'lastname' => 'Twain',
                'pseudonym' => 'Mark Twain',
                'birthday' => '1835-11-30',
                'city' => 'Florida, Stati Uniti',
                'bio' => 'Mark Twain è stato uno scrittore e umorista statunitense, famoso per romanzi come "Le avventure di Tom Sawyer" e "Le avventure di Huckleberry Finn".',
                'avatar' => 'https://th-thumbnailer.cdn-si-edu.com/Bysr6nOR-Y0eX6S4H2h6OURXTIQ=/1000x750/filters:no_upscale()/https://tf-cmsv2-smithsonianmag-media.s3.amazonaws.com/filer/f6/88/f688e680-3907-409f-890e-1f21c8d0c8fe/10498071004_e99fe14563_o.jpg',
            ],

            [
                'name' => 'Jack',
                'lastname' => 'Kerouac',
                'pseudonym' => 'Jack Kerouac',
                'birthday' => '1922-03-12',
                'city' => 'Massachusetts, Stati Uniti',
                'bio' => 'È considerato uno dei maggiori e più importanti scrittori statunitensi del XX secolo, nonché padre del Movimento Beat, perché nei suoi scritti esplicitò le idee di liberazione, di approfondimento della propria coscienza e di realizzazione alternativa della propria personalità.',
                'avatar' => 'https://www.visitmass.it/wp-content/uploads/2021/01/Jack-Kerouac-OK2.jpeg',
            ],

            [
                'name' => 'Terry',
                'lastname' => 'Pratchett',
                'pseudonym' => 'Terry Pratchett',
                'birthday' => '1948-04-28',
                'city' => 'Beaconsfield, Inghilterra',
                'bio' => 'Sir Terry Pratchett è stato uno scrittore britannico noto per la sua scrittura fantasy-umoristica, è principalmente noto per la sua lunga serie di romanzi ambientati nel Mondo Disco (Discworld).',
                'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/7/7a/10.12.12TerryPratchettByLuigiNovi1.jpg',
            ], 
        ];


        foreach ($autori as $autore) {
            Author::create($autore);
        }

    }
}
