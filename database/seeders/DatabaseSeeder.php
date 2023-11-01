<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Review;
use App\Models\Car;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //$this->call(AnimalTableSeeder::class);
        //$this->call(UserTableSeeder::class);
        //$this->call(CarTableSeeder::class);
        //$this->call(ReviewTableSeeder::class);
        //$this->call(CommentTableSeeder::class);


        $cars = Car::factory()->count(50)->create();

    
        User::factory()->has(Review::factory()
        ->state(function (array $attributes, Car $cars) {
            return ['car_id' => $cars->id];
        }))
        ->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
