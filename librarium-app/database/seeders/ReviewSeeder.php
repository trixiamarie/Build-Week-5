<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'user_id' => 2,
            'book_id' => 2,
            'rating' => 5,
            'title'=>'Ottima lettura',
            'review'=>'Ho apprezzato molto questo libro. La trama è avvincente e i personaggi sono ben sviluppati. È stata un\'esperienza di lettura emozionante e non vedo l\'ora di leggere altri libri dello stesso autore.',
        ]);
    }
}
