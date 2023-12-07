<?php

namespace App\Livewire;

use Livewire\Component;

class ShowReviewComments extends Component
{
    public $comments;

    public function render()
    {
        return view('livewire.show-review-comments');
    }

    public function mount($comments)
    {
        $this->comments = $comments;
    }
}
