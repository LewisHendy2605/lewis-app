@extends('layouts.appp')

@section('title', 'Car')

@section('content')
<ul> 
    <li>ID: {{$car->id}}</li> 
    <li>Manufacture: {{$car->manufacture}}</li>
    <li>Model: {{$car->model}}</li>   
    <li>Year: {{$car->year}}</li>
</ul>

<form method="POST"
    action="{{ route('cars.destroy', ['id' => $car->id]) }}">
    @csrf 
    @method('DELETE')
    <button type="submit">Delete</button>
</form>



<p><a href="{{ route('cars.index') }}">Back</a></p>
@endsection