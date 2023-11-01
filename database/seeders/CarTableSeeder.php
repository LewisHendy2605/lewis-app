<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //$t = new Car;
       // $t->manufacture = "Toyota";
       // $t->model = "GT86";
        //$t->year = 2016;
       // $t->save();

       // $n = new Car;
       // $n->manufacture = "Nissan";
       // $n->model = "GTR";
       // $n->year = 2001;
       // $n->save();

       Car::factory()->count(50)->create();
    }
}
