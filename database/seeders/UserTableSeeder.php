<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Review;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //User::factory()->count(50)->create();
        $t = new User;
        $t->name = "Toyota";
        $t->email = "GT86";
        $t->email_verified_at = 2016;
        $t->password = 2016;
        $t->rememberToken = 2016;
        $t->save();
    }
}
