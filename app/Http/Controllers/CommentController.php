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
        $cars = Car::get();
        $reviews = Review::get();

        return view('comments.create', ['cars' => $cars, 'reviews' => $reviews]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'review_id' => 'required|integer',
            'comment' => 'required|max:255',
            'user_id' => ['required', 'integer'],

        ]);

        $a = new Comment;
        $a->review_id = $validatedData['review_id'];
        $a->comment = $validatedData['comment'];
        $a->user_id = $validatedData['user_id'];
        $a->save();

        session()->flash('message', 'Comment was created');

        return redirect()->route('reviews.show', ['id' => $validatedData['review_id']]);
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
        $comment = $this->getComment($id);

        if (! Gate::allows('update-comment', $comment)) {
            session()->flash('message', 'Cannot edit - Not review creater');

            return redirect()->route('comments.show', ['id' => $id]);
        }

        return view('comments.edit', ['id' => $id, 'comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'comment' => 'required|max:255',
            'review_id' => 'required|integer',
            'user_id' => 'required|integer',

        ]);

        $affected = DB::table('comments')
              ->where('id', $id)
              ->update(['review_id' => $validatedData['review_id'],
              'user_id' => $validatedData['user_id'],
              'comment' => $validatedData['comment'],
            ]);


        session()->flash('message', 'Comment was updated');

        return redirect()->route('comments.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = $this->getComment($id);

        if (! Gate::allows('delete-comment', $comment)) {
            session()->flash('message', 'Cannot delete - Not comment creater');

            return redirect()->route('comments.show', ['id' => $id]);
        }

        $comment->delete();

        return redirect()->route('reviews.show', ['id' => $comment->review_id])->with('message', 'Comment was deleted');
    }

    public function getComment(string $id)
    {
        $comment = Comment::findorfail($id);

        return $comment;
    }
}
