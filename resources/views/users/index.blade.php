@extends('layouts.appp')

@section('title', 'Users')

@section('content')
    <h2><a href="{{ route('home')}}">Home</a></h2>
    <h4><a href="{{ route('users.create')}}">Create User</a></h4>
    <p></p>
    <h4><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Create User-Laravel</a></h4>
    <h3>{{$users->count()}} users</h3>
    <ul> 
        @foreach ($users as $user)
        <li><a href="{{route('users.show', ['id' => $user->id])}}" >
        User ID: {{$user->id}}</a></li> 
        <li>Name: {{$user->name}}</li>
        <li>Email: {{$user->email}}</li>
        <p></p>
        @endforeach
    </ul>
@endsection