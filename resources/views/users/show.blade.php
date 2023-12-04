@extends('layouts.appp')

@section('title', 'User')

@section('content')
<ul> 
    <li>User ID: {{$user->id}}</li> 
    <li>Name: {{$user->name}}</li>
    <li>Email: {{$user->email}}</li>
</ul>

<h2>Users Reviews</h2>

<ul> 
    @foreach ($reviews as $review)
        <li><a href="{{route('reviews.show', ['id' => $review->id])}}" >
            Review ID: {{$review->id}}</a></li> 
        @foreach ($cars as $car)
            @if ($car->id == $review->car_id)
                <li><a href="{{route('cars.show', ['id' => $car->id])}}">
                    Car: {{$car->manufacture}}, {{$car->model}}, ID: {{$car->id}}</a></li>
            @endif
        @endforeach  
        <li>Stars: {{$review->stars}}</li>
        <li>Comment: {{$review->comment}}</li>
        <p></p>
    @endforeach
</ul>


<button><a href="{{ route('users.index') }}">Back</a></button>
@endsection