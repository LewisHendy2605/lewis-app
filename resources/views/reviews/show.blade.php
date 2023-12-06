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

<form method="POST"
    action="{{ route('reviews.destroy', ['id' => $review->id]) }}">
    @csrf 
    @method('DELETE')
    <button type="submit">Delete Review</button>
</form>

<button><a href="{{ route('reviews.edit', ['id' => $review->id])}}">Edit Review</a></button>


<button><a href="{{ route('reviews.index') }}">Back</a></button>

@endsection