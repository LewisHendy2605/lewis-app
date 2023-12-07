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
                <option value="{{ $car->id }}"
                    @if ($car->id == old('car_id'))
                        selected="selected"
                    @endif
                >{{ $car->manufacture }}, {{ $car->model }}, {{ $car->year }}
                </option>
            @endforeach
        </select></li>
        <li>User: <input type="text" name="user_id"
                value="{{ Auth::id() }}"/></li>
        
        
        <input type="submit" value="submit"/>
    </ul>
    <button><a href="{{route('reviews.index')}}">Cancel</a></button>
</form>


@endsection