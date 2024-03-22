<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['name' => 'Narrativa Storica'],
            ['name' => 'Fantascienza'],
            ['name' => 'Fantasy'],
            ['name' => 'Mistero/Thriller'],
            ['name' => 'Romanzo'],
            ['name' => 'Horror'],
            ['name' => 'Avventura'],
            ['name' => 'Western'],
            ['name' => 'Giovani Adulti'],
            ['name' => 'Per Bambini'],
            ['name' => 'Biografia/Autobiografia'],
            ['name' => 'Memoir'],
            ['name' => 'Self-Help'],
            ['name' => 'Storia'],
            ['name' => 'Politica'],
            ['name' => 'Filosofia'],
            ['name' => 'Religione/Spiritualità'],
            ['name' => 'Psicologia'],
            ['name' => 'Scienza/Natura'],
            ['name' => 'Viaggi'],
            ['name' => 'Poesia Contemporanea'],
            ['name' => 'Poesia Classica'],
            ['name' => 'Poesia Epica'],
            ['name' => 'Haiku'],
            ['name' => 'Sonetto'],
            ['name' => 'Verso Libero'],
            ['name' => 'Poesia Lirica'],
            ['name' => 'Tragedia'],
            ['name' => 'Commedia'],
            ['name' => 'Dramma Storico'],
            ['name' => 'Farsa'],
            ['name' => 'Dramma Assurdo'],
        ];
        
        foreach ($genres as $genre) {
            Genre::create($genre);
        }
        
    }
}
