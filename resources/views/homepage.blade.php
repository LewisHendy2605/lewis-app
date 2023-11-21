@extends('layouts.appp')

@section('title', 'Home')

@section('content')
    <p><a href="{{ route('cars.index')}}">Cars</a></p>
    <p><a href="{{ route('reviews.index')}}">Reviews</a></p>
    <p><a href="{{ route('users.index')}}">Users</a></p>
@endsection