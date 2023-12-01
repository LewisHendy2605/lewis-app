<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Car;
use App\Models\Comment;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::get();
        $cars = Car::get();

        $num = count($users);

        for ($x = 0; $x <= $num; $x++) {
            $reviews = Review::factory()->for($users->random())
            ->for($cars->random())
            ->has(Comment::factory()->count(2))
            ->create();
        }
    }
}
