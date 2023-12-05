@extends('layouts.appp')

@section('title', 'Cars')

@section('content')
    <h2><a href="{{ route('home')}}">Home</a></h2>
    <h3></h3>
    <button><a href="{{ route('comments.create')}}">Create a Comment</a></button>

    <livewire:search-Comments/>
    
@endsection