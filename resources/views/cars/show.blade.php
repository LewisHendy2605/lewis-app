@extends('layouts.appp')

@section('title', 'Car')

@section('content')
<ul> 
    <li>Car ID: {{$car->id}}</li> 
    <li>Car Model: {{$car->model}}</li>   
    <li>Car Manufacture: {{$car->manufacture}}</li>
    <li>Car Year: {{$car->year}}</li>
</ul>
@endsection