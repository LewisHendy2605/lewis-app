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
        return [
            //
            //$users_id = DB::table('users')->pluck('id');
           // $cars_id = DB::table('cars')->pluck('id');

            //'user_id' => randomElement($users_id),
            //'user_id' => randomElement($cars_id),
            
            'stars' => fake()->numberBetween(0,5),
            'comment' => fake()->text()
        ];
    }
}
