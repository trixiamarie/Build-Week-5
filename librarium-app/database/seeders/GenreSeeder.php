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
            ['name' => 'Romanzo Storico'],
            ['name' => 'Fantasy'],
            ['name' => 'Romanzo Rosa'],
            ['name' => 'Mystery/Thriller'],
            ['name' => 'Science Fiction'],
            ['name' => 'Horror'],
            ['name' => 'Romanzo Contemporaneo'],
            ['name' => 'Classico'],
            ['name' => 'Biografia/Autobiografia'],
            ['name' => 'Poesia']
        ];
        
        foreach ($genres as $genre) {
            Genre::create($genre);
        }
        
    }
}
