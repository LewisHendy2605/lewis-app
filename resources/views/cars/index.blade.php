@extends('layouts.appp')

@section('title', 'Cars')

@section('content')
    <p> Cars </p>
    <ul> 
        @foreach ($cars as $car)
        <li>Car ID: {{$car->id}},    
            Car Model: {{$car->model}},    
            Car Manufacture: {{$car->manufacture}}
        </li>

        @endforeach
    </ul>
@endsection