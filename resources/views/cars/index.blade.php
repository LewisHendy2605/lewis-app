@extends('layouts.appp')

@section('title', 'Cars')

@section('content')
    <p> Cars </p>
    <ul> 
        @foreach ($cars as $car)
        <li>Car ID: {{$car->id}}</li> 
        <li>Car Model: {{$car->model}}</li>   
        <li>Car Manufacture: {{$car->manufacture}}</li>
        <li>Car Year: {{$car->year}}</li>
        @endforeach
    </ul>
@endsection