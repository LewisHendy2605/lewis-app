@extends('layouts.appp')

@section('title', 'Home Page')

@section('content')



    <div style="text-align: center">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ route('dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                    <h4><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></h4>
                    @if (Route::has('register'))
                        <h4><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></h4>
                    @endif
                @endauth
                </div>
        @endif
        <h2></h2>
        <h2><a href="{{ route('cars.index')}}">Cars</a></h2>
        <h2><a href="{{ route('reviews.index')}}">Reviews</a></h2>
        <h2><a href="{{ route('users.index')}}">Users</a></h2>
        <h2><a href="{{ route('comments.index')}}">Comments</a></h2>
    </div>
    

@endsection