<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::orderBy('car_id', 'asc')->get();
        return view('reviews.index', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('name', 'asc')->get();
        $cars = Car::orderBy('manufacture', 'asc')->get();

        return view('reviews.create', ['cars' => $cars, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stars' => 'required|integer|max:5|min:1',
            'comment' => 'required|max:255',
            'car_id' => 'required|integer|',
            'user_id' => ['required', 'integer'],

        ]);

        $a = new Review;
        $a->stars = $validatedData['stars'];
        $a->comment = $validatedData['comment'];
        $a->car_id = $validatedData['car_id'];
        $a->user_id = $validatedData['user_id'];
        $a->save();

        session()->flash('message', 'Review was created');

        return redirect()->route('dashboard');
        //return redirect()->route('reviews.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $review = $this->getReview($id);

        $user = User::findorfail($review->user_id);
        $car = Car::findorfail($review->car_id);

        return view('reviews.show', ['review' => $review, 'user' => $user, 'car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $review = $this->getReview($id);

        if (! Gate::allows('update-review', $review)) {
            //abort(403);
            session()->flash('message', 'Unauthorised User - Not review creater');

            return redirect()->route('reviews.show', ['id' => $id]);
        }

        return view('reviews.edit', ['id' => $id, 'review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate([
            'stars' => 'required|integer|max:5|min:1',
            'comment' => 'required|max:255',
            'car_id' => 'required|integer|',
            'user_id' => ['required', 'integer'],

        ]);

        $affected = DB::table('reviews')
              ->where('id', $id)
              ->update(['car_id' => $validatedData['car_id'],
              'user_id' => $validatedData['user_id'],
              'comment' => $validatedData['comment'],
            ]);


        session()->flash('message', 'Review was updated');

        return redirect()->route('reviews.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = $this->getReview($id);
        $review->delete();

        return redirect()->route('reviews.index')->with('message', 'Review was deleted');
    }

    public function getReview(string $id)
    {
        $review = Review::findorfail($id);

        return $review;
    }

}
