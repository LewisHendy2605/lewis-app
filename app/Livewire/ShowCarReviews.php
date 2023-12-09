<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use App\Models\User;

class ShowCarReviews extends Component
{

    public $searchInput = "";
    public $users;
    public $userid;
    public $car;
    public $reviews;

    public function render()
    {
        return view('livewire.show-car-reviews');
    }

    public function mount($reviews, $car, $userid)
    {
        $this->reviews = $reviews;
        $this->car = $car;
        $this->userid = $userid;
        $this->users = User::get();

    }

    public function resetArray()
    {
        $this->reviews = Review::where('car_id', $this->car->id)->get();

    }
}
