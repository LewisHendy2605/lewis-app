<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stars' => 'required|integer|max:5|min:1',
            'comment' => 'required|max:255',
            'car_id' => 'required|integer|max:60|min:1',
            'user_id' => 'required|integer|max:50|min:1'

        ]);

        $a = new Review;
        $a->stars = $validatedData['stars'];
        $a->comment = $validatedData['comment'];
        $a->car_id = $validatedData['car_id'];
        $a->user_id = $validatedData['user_id'];
        $a->save();

        session()->flash('message', 'Review was created');

        return redirect()->route('reviews.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $review = Review::findOrFail($id);
        return view('reviews.show', ['review' => $review]);
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
