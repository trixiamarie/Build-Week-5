<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bookId = \App\Models\Book::pluck('id')->random();
        $userId = \App\Models\User::exists() ? \App\Models\User::pluck('id')->random() : \App\Models\User::factory();

    return [
        'user_id' => $userId, 
        'book_id' => $bookId,
        'title' => $this->faker->sentence,
        'review' => $this->faker->paragraph,
        'rating' => $this->faker->numberBetween(1, 5),
    ];
    }
}
