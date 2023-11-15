<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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

        $comments = ["Best Car Ive bought", "Reliable", "Great Handling"
        , "Luxury interior and really fast", "woarse then a fiat 500",
         "Just like the fiat 500 this cars engine sucks all the joy from my day "];


        return [
            'stars' => fake()->numberBetween(0,5),
            'comment' => $this->faker->randomElement($comments)
        ];
    }
}
