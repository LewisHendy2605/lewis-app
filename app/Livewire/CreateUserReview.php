<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;
use App\Models\User;

class CreateUserReview extends Component
{
    public $cars;
    public $user;

    public function render()
    {
        return view('livewire.create-user-review');
    }

    public function mount($id)
    {
        $this->cars = Car::get();
        $this->user = User::findorfail($id);

    }
}
