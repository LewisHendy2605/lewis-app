<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    public function comments()
     {
        return $this->hasMany(Comment::class);
     }


}
