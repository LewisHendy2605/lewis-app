@extends('layouts.appp')

@section('title', 'User')

@section('content')
<ul> 
    <li>User ID: {{$user->id}}</li> 
    <li>Name: {{$user->name}}</li>
    <li>Email: {{$user->email}}</li>
    <li>Password: {{$user->password}}</li>
</ul>
@endsection