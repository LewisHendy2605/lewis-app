@extends('layouts.appp')

@section('title', 'Review')

@section('content')
<ul> 
    <li>Review ID: {{$review->id}}</li> 
    <li>Stars: {{$review->stars}}</li>   
    <li>Review: {{$review->comment}}</li>
    <li>CarID: {{$review->car_id}}</li>
    <p></p>
</ul>

@endsection