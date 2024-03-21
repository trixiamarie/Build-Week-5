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
                'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/George_Orwell_press_photo.jpg/440px-George_Orwell_press_photo.jpg',
            ],
            [
                'name' => 'Jane',
                'lastname' => 'Austen',
                'pseudonym' => 'Jane Austen',
                'birthday' => '1775-12-16',
                'city' => 'Steventon, Regno Unito',
                'bio' => 'Jane Austen è stata una scrittrice britannica, autrice di alcuni dei più famosi romanzi della letteratura inglese, tra cui "Orgoglio e pregiudizio" e "Emma".',
                'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/CassandraAusten-JaneAusten%28c.1810%29_hires.jpg/440px-CassandraAusten-JaneAusten%28c.1810%29_hires.jpg',
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
        ];


        foreach ($autori as $autore) {
            Author::create($autore);
        }

    }
}
