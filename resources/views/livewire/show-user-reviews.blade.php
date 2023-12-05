<div style="text-align: left">
   <h2>Reviews ( reviews)</h2>

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
