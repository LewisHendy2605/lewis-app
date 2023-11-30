@extends('layouts.appp')

@section('title', 'Create')

@section('content')

<form method="POST" action = "{{route('reviews.store')}}">
    @csrf
    <ul>     
        <li>Stars: <input type="text" name="stars"
            value="{{ old('stars') }}"/></li>
        <li>Review: <input type="text" name="comment"
            value="{{ old('comment') }}"/></li>
        <li>Car: <select name="car_id">
            @foreach ($cars as $car)
                <option value="{{ $car->id }}">
                {{ $car->manufacture }}, {{ $car->model }}, {{ $car->year }}
                </option>
            @endforeach
        </select></li>
        <li>User: <select name="user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->name }}
                </option>
            @endforeach
        </select></li>
        
        
        <input type="submit" value="submit"/>
    </ul>
    <a href="{{route('reviews.index')}}">Cancel</a>
</form>

@endsection