<div style="text-align: left">
    <h2>Search For Reviews</h2>

    <input type="text" wire:model="searchInput" placeholder="Search for Car....">

    <button wire:click="searchforreview">Search</button>
    <button wire:click="resetArray">Reset</button>

    <ul> 
        @foreach ($matchedReviews as $review)
        <li><a href="{{route('reviews.show', ['id' => $review->id])}}" >
        Review ID: {{$review->id}}</a></li> 
        <li>Stars: {{$review->stars}}</li>   
        <li>Review: {{$review->comment}}</li>
        <li>CarID: {{$review->car_id}}</li>
        <p></p>
        @endforeach
    </ul>

</div>
