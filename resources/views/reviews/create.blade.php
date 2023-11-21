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
        <li>CarID: <input type="text" name="car_id"
            value="{{ old('car_id') }}"/></li>
        <li>UserID: <input type="text" name="user_id"
            value="{{ old('car_id') }}"/></li>
        <input type="submit" value="submit"/>
    </ul>
    <a href="{{route('reviews.index')}}">Cancel</a>
</form>

@endsection