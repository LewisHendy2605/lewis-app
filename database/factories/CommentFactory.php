<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::get();

        $com = ["I agree", "Defintly", "I dont think your right", "Brooo a GT86 is wayyy better",
         "This dude knows his stuff"];


        return [
            'user_id' => ($this->faker->randomElement($users))->id,
            'comment' => $this->faker->randomElement($com)
        ];
    }
}
