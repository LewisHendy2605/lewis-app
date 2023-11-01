<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //Review::factory()->count(50)->create();

        $a = new Review;
        $a->user_id = 1;
        $a->car_id = 1;
        $a->stars = 5;
        $a->comment = "Very nice";
        $a->save();

        $a = new Review;
        $a->user_id = 2;
        $a->car_id = 2;
        $a->stars = 5;
        $a->comment = "Very nice";
        $a->save();

        $a = new Review;
        $a->user_id = 3;
        $a->car_id = 3;
        $a->stars = 5;
        $a->comment = "Very nice";
        $a->save();

        $a = new Review;
        $a->user_id = 4;
        $a->car_id = 4;
        $a->stars = 5;
        $a->comment = "Very nice";
        $a->save();

        $a = new Review;
        $a->user_id = 1;
        $a->car_id = 2;
        $a->stars = 5;
        $a->comment = "Very nice";
        $a->save();

    }
}
