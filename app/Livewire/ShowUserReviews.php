<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;

class ShowUserReviews extends Component
{
    public $reviews = Review::get();

    public function render()
    {
        return view('livewire.show-user-reviews');
    }
}
