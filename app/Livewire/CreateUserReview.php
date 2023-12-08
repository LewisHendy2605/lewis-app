<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;
use App\Models\User;
use App\Models\Review;

class CreateUserReview extends Component
{
    public $carid;
    public $stars;
    public $userid;
    public $cars;
    public $comment;


    public function render()
    {
        return view('livewire.create-user-review');
    }

    public function mount($id)
    {
        $this->userid = $id;
        $this->cars = Car::get();

    }

    public function createReview()
    {
        if (!empty($this->userid)) {
            $a = new Review;
            $a->user_id = $this->userid;
            $a->car_id =$this->carid;
            $a->comment = $this->comment;
            $a->stars = $this->stars;
            $a->save();

            session()->flash('message', 'Review was created');
        }
    }
}
