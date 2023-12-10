@extends('layouts.appp')

@section('title', 'Reviews')

@section('content')
    <h2><a href="{{ route('home')}}">Home</a></h2>
    <h3>{{$reviews->count()}} reviews</h3>

    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
            <button><a href="{{ route('reviews.create')}}">Create a Review</a></button>
        @else
            <h4>You need to log in to create a review</h4>
        @endauth
    </div>


    <div class="container">
        @foreach ($reviews as $review)
        <h3></h3>
        <table style="width:30%">
            <tr>
                <th>Review ID::</th>
                <td><a href="{{route('reviews.show', ['id' => $review->id])}}">
                    {{$review->id}}</a></td>
            </tr>
            <tr>
                <th>Stars:</th>
                <td>{{$review->stars}}</td>
            </tr>
            <tr>
                <th>Review:</th>
                <td>{{$review->comment}}</td>
            </tr>
            <tr>
                <th>Car ID:</th>
                <td><a href="{{route('cars.show', ['id' => $review->car_id])}}">
                    {{$review->car_id}}</a></td>
            </tr>
            <tr>
                @foreach ($cars as $car)
                    @if ($car->id == $review->car_id)
                        <th>Car:</th>
                        <td><a href="{{route('cars.show', ['id' => $review->car_id])}}">
                        {{$car->manufacture}}, {{$car->model}}</a></td>
                    @endif
                @endforeach 
        </tr>
        </table>
        @endforeach
    </div>

    <br>

    {{ $reviews->links() }}
@endsection