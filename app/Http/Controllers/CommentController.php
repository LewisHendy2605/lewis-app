<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Car;
use App\Models\Review;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::get();
        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reviews = Review::get();
        $cars = Car::orderBy('manufacture', 'asc')->get();

        return view('reviews.create', ['cars' => $cars, 'reviews' => $reviews]);
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

        $a = new Comment;
        $a->stars = $validatedData['stars'];
        $a->comment = $validatedData['comment'];
        $a->car_id = $validatedData['car_id'];
        $a->user_id = $validatedData['user_id'];
        $a->save();

        session()->flash('message', 'Review was created');

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = $this->getComment($id);

        $user = User::findorfail($comment->user_id);

        return view('comments.show', ['comment' => $comment, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $review = $this->getReview($id);

        if (! Gate::allows('update-review', $review)) {
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

        if (! Gate::allows('delete-review', $review)) {
            session()->flash('message', 'Unauthorised User - Not review creater');

            return redirect()->route('reviews.show', ['id' => $id]);
        }

        $review->delete();

        return redirect()->route('reviews.index')->with('message', 'Review was deleted');
    }

    public function getComment(string $id)
    {
        $comment = Comment::findorfail($id);

        return $comment;
    }
}
