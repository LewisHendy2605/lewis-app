@extends('layouts.appp')

@section('title', 'Comment')

@section('content')


<ul> 
    <li>ID: {{$comment->id}}</li> 
    <li>Review ID: {{$comment->review_id}}</li>
    <li>User ID: {{$comment->user_id}}</li>   
    <li>Comment: {{$comment->comment}}</li>
</ul>

<form method="POST"
    action="{{ route('comments.destroy', ['id' => $comment->id]) }}">
    @csrf 
    @method('DELETE')
    <button type="submit">Delete Comment</button>
</form>



<button><a href="{{ route('comments.edit', ['id' => $comment->id])}}">Edit Comment</a></button>


<button><a href="{{ route('comments.index') }}">Back</a></button>

@endsection