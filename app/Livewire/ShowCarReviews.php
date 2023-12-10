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
    public $carid;
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
        $this->carid = $car->id;
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

    protected $rules = [
        'stars' => 'required|integer|max:5|min:1',
        'comment' => 'required|max:255',
        'carid' => 'required|integer',
        'userid' => 'required|integer',
    ];

    public function createReview()
    {

        $this->validate();
 
        // Execution doesn't reach here if validation fails.
        $a = new Review;
        $a->stars = $this->stars;
        $a->comment = $this->comment;
        $a->car_id = $this->carid;
        $a->user_id = $this->userid;
        $a->save();


        $this->resetAll();

        session()->flash('message', 'Review was created');
        
    }

}
