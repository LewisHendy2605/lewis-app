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
        $admin->role = 'admin';
        $admin->remember_token = Str::random(10);
        $admin->save();

        $testmoderator = new User;
        $testmoderator->name = 'James Moderator';
        $testmoderator->email = 'jamesm@gmail.com';
        $testmoderator->email_verified_at = now();
        $testmoderator->password = '123';
        $testmoderator->role = 'moderator';
        $testmoderator->remember_token = Str::random(10);
        $testmoderator->save();

        $testuser = new User;
        $testuser->name = 'James Stevens';
        $testuser->email = 'jamesstevens@gmail.com';
        $testuser->email_verified_at = now();
        $testuser->password = '123';
        $testuser->role = 'user';
        $testuser->remember_token = Str::random(10);
        $testuser->save();


        User::factory()->count(50)->create();
    }
}
