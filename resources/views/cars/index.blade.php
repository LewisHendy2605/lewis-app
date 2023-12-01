@extends('layouts.appp')

@section('title', 'Cars')

@section('content')
    <h2><a href="{{ route('home')}}">Home</a></h2>
    <h3> {{$cars->count() }} cars</h3>
    <h4><a href="{{ route('cars.create')}}">Create a Car</a></h4>
    <ul> 
        @foreach ($cars as $car)
        <li><a href="{{route('cars.show', ['id' => $car->id])}}" >
            Car ID: {{$car->id}}</a></li>   
        <li>Car Manufacture: {{$car->manufacture}}</li>
        <li>Car Model: {{$car->model}}</li> 
        <li>Car Year: {{$car->year}}</li>
        <p></p>
        @endforeach
    </ul>
@endsection