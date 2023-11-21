<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cars = Car::all();
        return view('cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'manufacture' => 'required|max:255',
            'model' => 'required|max:255',
            'year' => 'required|max:4|min:4'

        ]);

        dd($validatedData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $car = Car::findOrFail($id);
        return view('cars.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
