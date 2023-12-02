@extends('layouts.appp')

@section('title', 'Car')

@section('content')
<ul> 
    <li>ID: {{$car->id}}</li> 
    <li>Manufacture: {{$car->manufacture}}</li>
    <li>Model: {{$car->model}}</li>   
    <li>Year: {{$car->year}}</li>
</ul>

<form method="POST"
    action="{{ route('cars.destroy', ['id' => $car->id]) }}">
    @csrf 
    @method('DELETE')
    <button type="submit">Delete Car</button>
</form>

<h2>Reviews for car</h2>

<ul> 
    @foreach ($reviews as $review)
        <li><a href="{{route('reviews.show', ['id' => $review->id])}}" >
            Review ID: {{$review->id}}</a></li>
        @foreach ($users as $user)
            @if ($user->id == $review->user_id)
                <li><a href="{{route('users.show', ['id' => $user->id])}}">
                User: {{$user->name}}, ID: {{$user->id}}</a></li>
            @endif
        @endforeach   
        <li>Stars: {{$review->stars}}</li>
        <li>Comment: {{$review->comment}}</li>
        <p></p>
        
    @endforeach
</ul>


<h2><a href="{{ route('cars.index') }}">Back</a></h2>
@endsection