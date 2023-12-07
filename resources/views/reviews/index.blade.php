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
            @if (Route::has('login'))
                <h4><a href="{{ route('login') }}">Log in</a></h4>
                @if (Route::has('register'))
                    <h4><a href="{{ route('register') }}">Register</a></h4>
                @endif
            @endif
        @endauth
<   /div>


    <livewire:searchReviews/>
@endsection