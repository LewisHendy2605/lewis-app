@extends('layouts.appp')

@section('title', 'Cars')

@section('content')
    <p> Cars </p>
    <p><a href="{{ route('cars.create')}}">Create a Car</a></p>
    <ul> 
        @foreach ($cars as $car)
        <li><a href="{{route('cars.show', ['id' => $car->id])}}" >
            Car ID: {{$car->id}}</a></li> 
        <li>Car Model: {{$car->model}}</li>   
        <li>Car Manufacture: {{$car->manufacture}}</li>
        <li>Car Year: {{$car->year}}</li>
        <p></p>
        @endforeach
    </ul>
@endsection