@extends('layouts.appp')

@section('title', 'Create')

@section('content')

<form method="POST" action = "{{route('cars.store')}}">
    @csrf
    <ul>     
        <li>Manufacture: <input type="text" name="manufacture"/></li>
        <li>Model: <input type="text" name="model"/></li>
        <li>Year: <input type="text" name="year"/></li>
    </ul>
    <a href="{{route('cars.index')}}">Cancel</a>
</form>

@endsection