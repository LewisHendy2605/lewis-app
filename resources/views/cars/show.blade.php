@extends('layouts.appp')

@section('title', 'Car')

@section('content')

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
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

<form method="POST"
    action="{{ route('cars.destroy', ['id' => $car->id]) }}">
    @csrf 
    @method('DELETE')
    <button type="submit">Delete Car</button>
</form>

<button><a href="{{ route('cars.edit', ['id' => $car->id])}}">Edit Car</a></button>

<h2>Reviews for Car</h2>

<table style="width:50%"> 
    @foreach ($reviews as $review)
        <tr>
            <th>Review ID:</th>
            <td><a href="{{route('reviews.show', ['id' => $review->id])}}" >
                {{$review->id}}</a></td>
        </tr>
        <tr>
            @foreach ($users as $user)
                @if ($user->id == $review->user_id)
                    <th>User:</th>
                    <td><a href="{{route('users.show', ['id' => $user->id])}}">
                    {{$user->name}}</a></td>
                @endif
            @endforeach 
        </tr>
        <tr>
            <th>Stars:</th>
            <td>{{$review->stars}}</td>
        </tr>
        <tr>
            <th>Comment:</th>
            <td>{{$review->comment}}</td>
        </tr>
    @endforeach
</table>

<h3></h3>

<button><a href="{{ route('cars.index') }}">Back</a></button>

@endsection