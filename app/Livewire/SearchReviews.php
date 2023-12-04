<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;

class SearchReviews extends Component
{

    public $reviewID;
    public $review;
    public $searchInput = "";
    public $matchedReviews = [];

    public function render()
    {
        return view('livewire.search-reviews');
    }


    public function mount()
    {
        $this->matchedReviews = Review::get();
    }

    public function resetArray()
    {
        $this->matchedReviews = Review::get();
    }

    public function searchforreview()
    {
        $reviews = Review::get();
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
}
