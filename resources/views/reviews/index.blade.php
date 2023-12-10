@extends('layouts.appp')

@section('title', 'Reviews')

@section('content')
    <h2><a href="{{ route('home')}}">Home</a></h2>
    <h3>{{$reviews->count()}} reviews</h3>

    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
            <button><a href="{{ route('reviews.create')}}">Create a Review</a></button>
        @else
            <h4>You need to log in to create a review</h4>
        @endauth
    </div>

    <div class="container">
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
    </div>

    {{ $reviews->links() }}
@endsection