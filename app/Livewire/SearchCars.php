<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;

class SearchCars extends Component
{
    public $carID;
    public $car;
    public $carsSize;
    public $searchInput = "";
    public $matchedCars = [];

    public function render()
    {
        return view('livewire.search-cars');
    }

    public function mount()
    {
        $this->matchedCars = Car::orderBy('manufacture', 'asc')->get();
        $this->carsSize = $this->matchedCars->count();
    }

    public function resetArray()
    {
        $this->matchedCars = Car::orderBy('manufacture', 'asc')->get();
    }

    public function searchforcar()
    {
        $cars = Car::get();
        $this->matchedCars = [];

        if (!empty($this->searchInput)) {
            foreach ($cars as $car) { //Maybe evaluate all sim scores at the end, get the highest
                if ($this->isSimilar($car->manufacture, $this->searchInput)) {
                    array_push($this->matchedCars, $car);
                } 
                elseif ($this->isSimilar($car->model, $this->searchInput)) {
                    array_push($this->matchedCars, $car);
                }
                elseif ($car->year == $this->searchInput) {
                    array_push($this->matchedCars, $car);
                }
            }
        }
    }

    public function isSimilar(string $one, string $two)
    {
        $similar = false;
        $common = similar_text($one, $two, $percent);
        if ($percent > 40) {
            $similar = true;
        }

        return $similar;

    }

}
