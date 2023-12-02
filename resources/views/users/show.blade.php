@extends('layouts.appp')

@section('title', 'User')

@section('content')
<ul> 
    <li>User ID: {{$user->id}}</li> 
    <li>Name: {{$user->name}}</li>
    <li>Email: {{$user->email}}</li>
    <li>Password: {{$user->password}}</li>
</ul>

<h2>Users Reviews</h2>

<ul> 
    @foreach ($reviews as $review)
        @if ($review->user_id == $user->id)
            <li><a href="{{route('reviews.show', ['id' => $review->id])}}" >
                 Review ID: {{$review->id}}</a></li>   
            <li>Stars: {{$review->stars}}</li>
            <li>Comment: {{$review->comment}}</li> 
            <li><a href="{{route('cars.show', ['id' => $car->id])}}">
                Car: {{$car->manufacture}}, {{$car->model}}, ID: {{$car->id}}</a></li>
            <li>User ID: {{$review->user_id}}</li>
            <p></p>
        @endif
    @endforeach
</ul>


<p><a href="{{ route('users.index') }}">Back</a></p>
@endsection