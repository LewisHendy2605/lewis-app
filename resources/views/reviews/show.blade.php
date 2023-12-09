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

<br>

<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
    <button><a href="{{ route('reviews.edit', ['id' => $review->id])}}">Edit Review</a></button>
    <h3></h3>
    <form method="POST"
        action="{{ route('reviews.destroy', ['id' => $review->id]) }}">
        @csrf 
        @method('DELETE')
        <button type="submit">Delete Review</button>
        <hr>
    </form>
</div>

<livewire:show-review-comments :comments="$comments" :userid="Auth::id()" :reviewid="$review->id"/>

@endsection