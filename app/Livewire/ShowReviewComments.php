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

class ShowReviewComments extends Component
{
    public $comments;
    public $comment;
    public $reviewid;
    public $userid;
    public $users;

    public function render()
    {
        return view('livewire.show-review-comments');
    }

    public function mount($comments, $userid, $reviewid)
    {
        $this->comments = $comments;
        $this->reviewid = $reviewid;
        $this->userid = $userid;
        $this->users = User::get();

    }

    public function resetArray()
    {
        $this->comments = Comment::where('review_id', $this->reviewid)->get();
    }

    public function resetAll()
    {
        $this->resetArray();
        $this->comment = null;
    }

    protected $rules = [
        'comment' => 'required|max:255',
        'reviewid' => 'required|integer',
        'userid' => 'required|integer',
    ];

    public function createComment()
    {
        $this->validate();
        
        $a = new Comment;
        $a->review_id = $this->reviewid;
        $a->user_id =$this->userid;
        $a->comment = $this->comment;
        $a->save();

        $this->resetAll();

        session()->flash('message', 'Comment was created');
        
    }
}
