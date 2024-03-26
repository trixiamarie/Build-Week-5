<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bookId = \App\Models\Book::pluck('id')->random();
        $userId = \App\Models\User::pluck('id')->random();
        
        return [
            'user'=> $userId,
            'book' => $bookId,
            'collectiondate'=>$this->faker->date(),
            'state' => $this->faker->randomElement(['pending', 'accettato', 'negato']),
        ];
    }
}
