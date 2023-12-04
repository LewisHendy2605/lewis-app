@extends('layouts.appp')

@section('title', 'Reviews')

@section('content')
    <h2><a href="{{ route('home')}}">Home</a></h2>
    <h3>{{$reviews->count()}} reviews</h3>
    <button><a href="{{ route('reviews.create')}}">Create a Review</a></button>

    <livewire:searchReviews/>
@endsection