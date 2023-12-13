@extends('layouts.appp')

@section('title', 'Create')

@section('content')

<form method="POST" action = "{{route('cars.store')}}">
    @csrf
    <ul>     
        <li>Manufacture: <input type="text" name="manufacture"
            value="{{ old('manufacture') }}"/></li>
        <li>Model: <input type="text" name="model"
            value="{{ old('model') }}"/></li>
        <li>Year: <input type="text" name="year"
            value="{{ old('year') }}"/></li>
        <input type="file" name="image" id="image">
        
        <input type="submit" value="submit"/>
    </ul>
    <button><a href="{{route('cars.index')}}">Cancel</a></button>
</form>

@endsection