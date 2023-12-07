@extends('layouts.appp')

@section('title', 'Create')

@section('content')

    @auth
        <form method="POST" action = "{{route('comments.store')}}">
            @csrf
            <ul>
                <li>User: <input type="text" name="user_id"
                    value="{{ Auth::id() }}"/></li>  
                <li>Comment: <input type="text" name="comment"
                    value="{{ old('comment') }}"/></li>
                <li>Review: <select name="review_id">
                    @foreach ($reviews as $review)
                        <option value="{{ $review->id }}"
                            @if ($review->id == old('review_id'))
                                selected="selected"
                            @endif
                        >{{ $review->id }}
                        </option>
                    @endforeach
                </select></li>
                <input type="submit" value="submit"/>
            </ul>
            <button><a href="{{route('comments.index')}}">Cancel</a></button>
        </form>
    @else
        <div style="text-align: center">
            <h2>You need to login to create a comment</h2>
            <button><a href="{{route('comments.index')}}">Back</a></button>

            @if (Route::has('login'))
                <h4><a href="{{ route('login') }}">Log in</a></h4>
                @if (Route::has('register'))
                    <h4><a href="{{ route('register') }}">Register</a></h4>
                @endif
            @endif
        </div>
    @endauth
@endsection