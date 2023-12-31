@extends('layouts.appp')

@section('title', 'Cars')

@section('content')
    <h2><a href="{{ route('home')}}">Home</a></h2>
    <h3></h3>

    @can('admin')
        <button><a href="{{ route('cars.create')}}">Create a Car</a></button>
    @endcan

    <div class="container">
        @foreach ($cars as $car)
        <h3></h3>
        <table style="width:30%">
            <tr>
                <th><a href="{{route('cars.show', ['id' => $car->id])}}">
                    Car ID:</a></th>
                <td><a href="{{route('cars.show', ['id' => $car->id])}}">
                    {{$car->id}}</a></td>
            </tr>
            <tr>
                <th>Manufacture:</th>
                <td><a href="{{route('cars.show', ['id' => $car->id])}}">
                    {{$car->manufacture}}</a></td>
            </tr>
            <tr>
                <th>Model:</th>
                <td><a href="{{route('cars.show', ['id' => $car->id])}}">
                    {{$car->model}}</a></td>
            </tr>
            <tr>
                <th>Year:</th>
                <td><a href="{{route('cars.show', ['id' => $car->id])}}">
                    {{$car->year}}</a></td>
            </tr>
        </table>
        @endforeach
    </div>

    <br>
 
    {{ $cars->links() }}

    
    
@endsection