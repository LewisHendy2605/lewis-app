@extends('layouts.appp')

@section('title', 'Review')

@section('content')
<ul> 
    <li><a href="{{route('reviews.show', ['id' => $review->id])}}" >
        Review ID: {{$review->id}}</li> 
    <li>Stars: {{$review->stars}}</li>   
    <li>Review: {{$review->comment}}</li>
    <li>CarID: {{$review->car_id}}</li>
</ul>
@endsection