@extends('layouts.appp')

@section('title', 'Reviews')

@section('content')
    @if($review)
        <p> Hello, you are at the reviews page for Review {{$review}} </p>
    @else
        <p> Hello, you are at the reviews page !! </p>
    @endif
@endsection