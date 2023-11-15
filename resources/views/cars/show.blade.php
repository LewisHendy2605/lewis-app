@extends('layouts.appp')

@section('title', 'Car')

@section('content')
    <p> CarID: {{$car->id}} </p>
    <p> Car Model: {{$car->model}} </p>
    <p> Car Manufacture: {{$car->manufacture}} </p>
@endsection