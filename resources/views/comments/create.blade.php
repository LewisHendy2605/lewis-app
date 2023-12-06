@extends('layouts.appp')

@section('title', 'Create')

@section('content')

<form method="POST" action = "{{route('reviews.store')}}">
    @csrf
    <ul>     
        <li>Comment: <input type="text" name="comment"
            value="{{ old('comment') }}"/></li>
        <input type="hidden" name="user_id"
            value="{{ $id }}"/>
        <input type="hidden" name="review_id"
            value="{{ $reviewid }}"/>
        <input type="hidden" name="car_id"
            value="{{ $carid }}"/>
        
        
        <input type="submit" value="submit"/>
    </ul>
    <button><a href="{{route('reviews.index')}}">Cancel</a></button>
</form>

@endsection