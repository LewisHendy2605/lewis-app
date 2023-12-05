<style>
table, th, td {
    border: 2px solid green;;
    border-collapse: collapse;
    padding: 50px;
}
th, td {
  padding: 5px;
  text-align: left;
}

</style>
<div style="text-align: left">
    <h2>Reviews</h2>

    <input type="text" wire:model="searchInput" placeholder="Search for Car....">

    <button wire:click="searchforcar">Search</button>
    <button wire:click="resetArray">Reset</button>
    <h2></h2>

    @if ($matchedReviews->count() < 1)
        <h2>No reviews from {{$user->name}}</h2>
    @else
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
            </table>
        @endforeach
    @endif

</div>
