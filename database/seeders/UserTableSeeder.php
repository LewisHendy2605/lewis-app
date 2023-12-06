<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User;
        $admin->name = 'Lewis Hendy';
        $admin->email = 'lewishendy26@gmail.com';
        $admin->email_verified_at = now();
        $admin->password = '123';
        $admin->remember_token = Str::random(10);
        $admin->save();


        User::factory()->count(50)->create();
    }
}
