@extends('layouts.appp')

@section('title', 'Reviews')

@section('content')
    <h2><a href="{{ route('home')}}">Home</a></h2>
    <h3>{{$reviews->count()}} reviews</h3>
    <h4><a href="{{ route('reviews.create')}}">Create a Review</a></h4>
    <ul> 
        @foreach ($reviews as $review)
        <li><a href="{{route('reviews.show', ['id' => $review->id])}}" >
        Review ID: {{$review->id}}</a></li> 
        <li>Stars: {{$review->stars}}</li>   
        <li>Review: {{$review->comment}}</li>
        <li>CarID: {{$review->car_id}}</li>
        <p></p>
        @endforeach
    </ul>
@endsection