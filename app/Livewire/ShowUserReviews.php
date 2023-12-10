<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use App\Models\User;
use App\Models\Car;

class ShowUserReviews extends Component
{
    public $user;
    public $reviewID;
    public $review;
    public $searchInput = "";
    public $matchedReviews = [];
    public $matchedReviewsCount = 0;
    public $carid;
    public $stars;
    public $userid;
    public $cars;
    public $comment;

    public function render()
    {
        return view('livewire.show-user-reviews');
    }

    public function mount($id)
    {
        $this->user = User::findorfail($id);
        $this->userid = $id;
        $this->matchedReviews = Review::where('user_id', $id)->get();
        $this->cars = Car::get();
        $this->matchedReviewsCount = $this->matchedReviews->count();
    }

    public function resetArray()
    {
        $this->matchedReviews = Review::where('user_id', $this->user->id)->get();
    }

    public function resetAll()
    {
        $this->resetArray();
        $this->stars = null;
        $this->comment = null;
        $this->carid = null;

    }

    public function search()
    {
        $reviews = Review::where('user_id', $this->user->id)->get();
        $this->matchedReviews = [];

        if (!empty($this->searchInput)) {
            foreach ($reviews as $review) { //Maybe evaluate all sim scores at the end, get the highest
                if ($review->car_id == $this->searchInput) {
                    array_push($this->matchedReviews, $review);
                } 
                elseif ($review->id == $this->searchInput) {
                    array_push($this->matchedReviews, $review);
                } 
                elseif ($this->isSimilar($review->comment, $this->searchInput)) {
                    array_push($this->matchedReviews, $review);
                }
                elseif ($review->stars == $this->searchInput) {
                    array_push($this->matchedReviews, $review);
                }
                
            }
            sort($this->matchedReviews);
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

    protected $rules = [
        'stars' => 'required|integer|max:5|min:1',
        'comment' => 'required|max:255',
        'carid' => 'required|integer',
        'userid' => 'required|integer',
    ];

    public function createReview()
    {
        $this->validate();

        $a = new Review;
        $a->user_id = $this->userid;
        $a->car_id =$this->carid;
        $a->comment = $this->comment;
        $a->stars = $this->stars;
        $a->save();

        $this->resetAll();

        session()->flash('message', 'Review was created');
    }

}
