@extends('layouts.appp')

@section('title', 'Cars')

@section('content')
    <h2><a href="{{ route('home')}}">Home</a></h2>
    <h3> {{$cars->count() }} cars</h3>
    <h4><a href="{{ route('cars.create')}}">Create a Car</a></h4>

    <livewire:searchCars/>
    
@endsection