<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use App\Models\User;
use App\Models\Car;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class CreateReviewComment extends Component
{
    public $comment;
    public $reviewid;
    public $userid;

    public function render()
    {
        return view('livewire.create-review-comment');
    }

    public function mount($userid, $reviewid)
    {
        $this->reviewid = $reviewid;
        $this->userid = $userid;
    }

    public function createComment()
    {
        if (!empty($this->comment)) {
            $a = new Comment;
            $a->review_id = $this->reviewid;
            $a->user_id =$this->userid;
            $a->comment = $this->comment;
            $a->save();

            session()->flash('message', 'Comment was created');
        }
    }
}
