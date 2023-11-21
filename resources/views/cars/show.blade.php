@extends('layouts.appp')

@section('title', 'Car')

@section('content')
<ul> 
    <li>ID: {{$car->id}}</li> 
    <li>Manufacture: {{$car->manufacture}}</li>
    <li>Model: {{$car->model}}</li>   
    <li>Year: {{$car->year}}</li>
</ul>
@endsection