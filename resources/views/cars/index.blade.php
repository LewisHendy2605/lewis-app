@extends('layouts.appp')

@section('title', 'Cars')

@section('content')
    <p> Cars </p>
    <ul> 
        @foreach ($cars as $car)
        <li>{{$car->model}}</li>

        @endforeach
    </ul>
@endsection