<div style="text-align: left">
   <h2>Reviews ( reviews)</h2>

    <input type="text" wire:model="searchInput" placeholder="Search for Review....">

    <button wire:click="search">Search</button>
    <button wire:click="resetArray">Reset</button>
    <h2></h2>

    <h3>Add a review</h3>
    <li>Stars: <input type="text" wire:model="stars"/></li>
    <li>Comment: <input type="text" wire:model="comment"/></li>
    <li>Car: <select wire:model="carid">
        @foreach ($cars as $car)
            <option value="{{ $car->id }}"
                @if ($car->id == old('car_id'))
                    selected="selected"
                @endif
                >{{ $car->manufacture }}, {{ $car->model }}, {{ $car->year }}
                </option>
            @endforeach
        </select></li>
    <button wire:click="createReview">Post</button>

        @foreach ($matchedReviews as $review)
            <h2></h2>
            <table style="width:50%"> 
                <tr>
                    <th>Review ID:</th>
                    <td><a href="{{route('reviews.show', ['id' => $review->id])}}" >
                        {{$review->id}}</a></td>
                </tr>
                <tr>
                    <th>Stars:</th>
                    <td>{{$review->stars}}</td>
                </tr>
                <tr>
                    <th>Comment:</th>
                    <td>{{$review->comment}}</td>
                </tr>
                <tr>
                    <th>Car ID:</th>
                    <td>{{$review->car_id}}</td>
                </tr>
            </table>
        @endforeach


</div>
