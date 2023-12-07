@extends('layouts.appp')

@section('title', 'Review')

@section('content')
<ul> 
    <li>Review ID: {{$review->id}}</li> 
    <li>Stars: {{$review->stars}}</li>   
    <li>Review: {{$review->comment}}</li>
    <li><a href="{{route('cars.show', ['id' => $car->id])}}">
        Car: {{$car->manufacture}}, {{$car->model}}, ID: {{$car->id}}</a></li>
    <li><a href="{{route('users.show', ['id' => $user->id])}}">
        User: {{$user->name}}, ID: {{$user->id}}</a></li>
    <p></p>
</ul>

<div><button><a href="{{ route('reviews.index') }}">Back</a></button></div>


<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
    @auth
        <button><a href="{{ route('reviews.edit', ['id' => $review->id])}}">Edit Review</a></button>
        <form method="POST"
            action="{{ route('reviews.destroy', ['id' => $review->id]) }}">
            @csrf 
            @method('DELETE')
            <button type="submit">Delete Review</button>

            <h3></h3>

            <a href="{{ route('comments.create'), }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Add Comment</a>
            <button><a href="{{ route('reviews.edit', ['id' => $review->id])}}">Edit Review</a></button>
        </form>
    @else
        <h4>You need to log in to edit/delete this review and to add a comment</h4>
        @if (Route::has('login'))
                <h4><a href="{{ route('login') }}">Log in</a></h4>
                @if (Route::has('register'))
                    <h4><a href="{{ route('register') }}">Register</a></h4>
                @endif
            @endif
    @endauth
</div>


<h2>Comments On Review</h2>

@foreach ($comments as $comment)
    <h3></h3>
        <table style="width:50%">
        <tr>
            <th>Comment ID:</th>
            <td><a href="{{route('comments.show', ['id' => $comment->id])}}" >
                {{$comment->id}}</a></td>
        </tr>
        <tr>
            <th>User ID:</th>
            <td><a href="{{route('users.show', ['id' => $comment->user_id])}}" >
                {{$comment->user_id}}</a></td>
        </tr>
        <tr>
            <th>Comment:</th>
            <td>{{$comment->comment}}</td>
        </tr>
        <tr>
            <th>Review ID:</th>
            <td>{{$comment->review_id}}</td>
        </tr>
        </table>
    @endforeach

<h3></h3>

@endsection