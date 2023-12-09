@extends('layouts.appp')

@section('title', 'Car')

@section('content')

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 40px;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>

<ul> 
    <li>ID: {{$car->id}}</li> 
    <li>Manufacture: {{$car->manufacture}}</li>
    <li>Model: {{$car->model}}</li>   
    <li>Year: {{$car->year}}</li>
</ul>

@can('admin')
    <form method="POST"
        action="{{ route('cars.destroy', ['id' => $car->id]) }}">
        @csrf 
        @method('DELETE')
        <button type="submit">Delete Car</button>
    </form>
    <br>

    <button><a href="{{ route('cars.edit', ['id' => $car->id])}}">Edit Car</a></button>
@endcan


<br>
<br>

<button><a href="{{ route('cars.index') }}">Back</a></button>

<livewire:show-car-reviews :reviews="$reviews" :car="$car" :userid="Auth::id()" />

@endsection