@extends('layouts.appp')

@section('title', 'Create')

@section('content')

<form method="POST" action = "{{route('users.store')}}">
    @csrf
    <ul>     
        <li>Name: <input type="text" name="name"
            value="{{ old('name') }}"/></li>
        <li>Email: <input type="text" name="email"
            value="{{ old('email') }}"/></li>
        <li>Email Verified At: <input type="text" name="email_verified_at"
            value="{{ old('email_verified_at') }}"/></li>
        <li>Password: <input type="text" name="password"
            value="{{ old('password') }}"/></li>
        <input type="submit" value="submit"/>
    </ul>
    <a href="{{route('users.index')}}">Cancel</a>
</form>

@endsection