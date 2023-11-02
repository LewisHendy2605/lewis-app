<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Review;
use App\Models\Car;
use App\Models\Comment;


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
    
        $user = User::factory()  
        ->count(10)  
        ->has(Review::factory()->count(3))
        ->create();


        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
