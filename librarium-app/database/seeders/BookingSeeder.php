<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'user' => 2,
            'book' => 1,
            'collectiondate'=>'2024-03-21',
            'return'=>'2024-04-20'
        ]);
        Booking::create([
            'user' => 2,
            'book' => 2,
            'collectiondate'=>'2024-03-21',
            'return'=>'2024-04-20'
        ]);
    }
}
