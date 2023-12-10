<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;
use App\Models\Review;
use App\Models\User;
use App\Http\Controllers\Controller;



class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$cars = $this->getOrdered();

        //return view('cars.index', ['cars' => $cars]);

        return view('cars.index', [
            'cars' => DB::table('cars')->simplePaginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = $this->getOrdered();

        return view('cars.create', ['cars' => $cars]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'manufacture' => 'required|max:255', 
            'model' => 'required|max:255',
            'year' => 'required|integer|max:2023|min:1950'

        ]);

        $a = new Car;
        $a->manufacture = $validatedData['manufacture'];
        $a->model = $validatedData['model'];
        $a->year = $validatedData['year'];
        $a->save();

        session()->flash('message', 'Car was created');

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = $this->getCar($id);

        $reviews = Review::where('car_id', $id)->get();

        $users = User::get();

        return view('cars.show', ['car' => $car, 'reviews' => $reviews, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = $this->getCar($id);
        return view('cars.edit', ['id' => $id, 'car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'manufacture' => 'required|max:255', 
            'model' => 'required|max:255',
            'year' => 'required|integer|max:2023|min:1950'

        ]);

        $affected = DB::table('cars')
              ->where('id', $id)
              ->update(['manufacture' => $validatedData['manufacture'],
              'model' => $validatedData['model'],
              'year' => $validatedData['year'],
            ]);

        session()->flash('message', 'Car was updated');

        return redirect()->route('cars.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = $this->getCar($id);
        $car->delete();

        return redirect()->route('cars.index')->with('message', 'Car was deleted');
    }

    public function getCar(string $id)
    {
        $car = Car::findorfail($id);

        return $car;
    }

    public function getOrdered()
    {
        $cars = Car::orderBy('manufacture', 'asc')->get();

        return $cars;
    }

}
