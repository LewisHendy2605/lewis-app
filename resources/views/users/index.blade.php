@extends('layouts.appp')

@section('title', 'Users')

@section('content')
    <p> Users </p>
    <ul> 
        @foreach ($users as $user)
        <li><a href="{{route('users.show', ['id' => $user->id])}}" >
        User ID: {{$user->id}}</li> 
        <p></p>
        @endforeach
    </ul>
@endsection