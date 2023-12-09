<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use App\Models\User;
use App\Models\Car;

class ShowCarReviews extends Component
{

    public $searchInput = "";
    public $users;
    public $userid;
    public $car;
    public $cars;
    public $reviews;

    public $stars;
    public $comment;

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
        $this->cars = Car::orderBy('manufacture', 'asc')->get();

    }

    public function resetArray()
    {
        $this->reviews = Review::where('car_id', $this->car->id)->get();

    }

    public function resetAll()
    {
        $this->resetArray();
        $this->stars = null;
        $this->comment = null;
    }

    public function allEmpty()
    {
        return (empty($this->userid) || empty($this->stars) || empty($this->comment));
    }

    public function createReview()
    {
        if (!($this->allEmpty())) {
            $a = new Review;
            $a->user_id = $this->userid;
            $a->car_id =$this->car->id;
            $a->comment = $this->comment;
            $a->stars = $this->stars;
            $a->save();

            $this->resetAll();

            session()->flash('message', 'Review was created');
        }
        else 
        {
            session()->flash('message', 'All fields need to be entered');
        }
    }
}
