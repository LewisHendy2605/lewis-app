@extends('layouts.appp')

@section('title', 'Reviews')

@section('content')
    <p> Reviews </p>
    <ul> 
        @foreach ($reviews as $review)
        <li><a href="{{route('reviews.show', ['id' => $review->id])}}" >
        Review ID: {{$review->id}}</li> 
        <li>Stars: {{$review->stars}}</li>   
        <li>Review: {{$review->comment}}</li>
        <li>CarID: {{$review->car_id}}</li>
        <p></p>
        @endforeach
    </ul>
@endsection