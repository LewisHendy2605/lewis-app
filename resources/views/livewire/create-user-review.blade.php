<div>
    <h1>Create a review</h1>
<form method="POST" action = "{{route('reviews.store')}}">
    @csrf
    <ul>     
        <li>Stars: <input type="text" name="stars"
            value="{{ old('stars') }}"/></li>
        <li>Review: <input type="text" name="comment"
            value="{{ old('comment') }}"/></li>
        <li>Car: <select name="car_id">
            @foreach ($cars as $car)
                <option value="{{ $car->id }}"
                    @if ($car->id == old('car_id'))
                        selected="selected"
                    @endif
                >{{ $car->manufacture }}, {{ $car->model }}, {{ $car->year }}
                </option>
            @endforeach
        </select></li>
        <input type="hidden" name="user_id"
            value="{{ $user->id }}"/>
        
        <input type="submit" value="submit"/>
    </ul>
</form>
</div>
