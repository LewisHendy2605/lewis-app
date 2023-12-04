<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;

class SearchCars extends Component
{
    public $carID;
    public $car;

    public function render()
    {
        return view('livewire.search-cars');
    }

    public function mount()
    {
        $this->car = Car::findorfail(1);
    }

    public function setCar()
    {
        $id = $this->carID;
        $this->car = Car::findorfail($id);
    }
}
