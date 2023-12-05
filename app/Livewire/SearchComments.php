<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class SearchComments extends Component
{
    public $commentID;
    public $comment;
    public $searchInput = "";
    public $matchedComments = [];
   
    public function render()
    {
        return view('livewire.search-comments');
    }
    

    public function mount()
    {
        $this->matchedComments = Comment::get();
    }

    public function resetArray()
    {
        $this->matchedComments = Comment::get();
    }

    public function searchForComment()
    {
        $comments = Comment::get();
        $this->matchedComments = [];

        if (!empty($this->searchInput)) {
            foreach ($comments as $comment) { //Maybe evaluate all sim scores at the end, get the highest
                if ($comment->id == $this->searchInput) {
                    array_push($this->matchedComments, $comment);
                } 
                elseif ($comment->user_id == $this->searchInput) {
                    array_push($this->matchedComments, $comment);
                } 
                elseif ($this->isSimilar($comment->comment, $this->searchInput)) {
                    array_push($this->matchedComments, $comment);
                }
                elseif ($comment->review_id == $this->searchInput) {
                    array_push($this->matchedComments, $comment);
                }
            }
            sort($this->matchedComments);
        }
    }

    public function isSimilar(string $one, string $two)
    {
        $similar = false;
        $common = similar_text($one, $two, $percent);
        if ($percent > 50) {
            $similar = true;
        }

        return $similar;

    }
}
