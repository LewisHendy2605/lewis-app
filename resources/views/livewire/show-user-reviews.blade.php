<div style="text-align: left">

    <h3>Create a review</h3>

    <form wire:submit.prevent="createReview">
        <li>Stars: <input type="text" wire:model="stars"/></li>
        @error('stars') <span class="error">{{ $message }}</span> @enderror

        <li>Comment: <input type="text" wire:model="comment"/></li>
        @error('comment') <span class="error">{{ $message }}</span> @enderror

        <li>Car: <select wire:model="carid">
            @foreach ($cars as $car)
                <option value="{{ $car->id }}"
                    >{{ $car->manufacture }}, {{ $car->model }}, {{ $car->year }}
                </option>
                @endforeach
                </select></li>
        @error('carid') <span class="error">{{ $message }}</span> @enderror

        <br>

        <button type="submit">Post</button>
    </form>



        <h2>Reviews ({{$matchedReviewsCount}} reviews)</h2>

        <input type="text" wire:model="searchInput" placeholder="Search for Review....">

        <button wire:click="search">Search</button>
        <button wire:click="resetArray">Reset</button>
        <h2></h2>



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
