<div>
    {{}}
    <ul> 
        @foreach ($reviews as $review)
            <li><a href="{{route('reviews.show', ['id' => $review->id])}}" >
                Review ID: {{$review->id}}</a></li> 
            @foreach ($cars as $car)
                @if ($car->id == $review->car_id)
                    <li><a href="{{route('cars.show', ['id' => $car->id])}}">
                        Car: {{$car->manufacture}}, {{$car->model}}, ID: {{$car->id}}</a></li>
                @endif
            @endforeach  
            <li>Stars: {{$review->stars}}</li>
            <li>Comment: {{$review->comment}}</li>
            <p></p>
        @endforeach
    </ul>
</div>
