<div>

<h3>Add a review</h3>
    <li>Stars: <input type="text" wire:model="stars"/></li>
    <li>Comment: <input type="text" wire:model="comment"/></li>
    <button wire:click="createReview">Post</button>

<br>

<form wire:submit.prevent="createReview">
    <li>Stars: <input type="text" wire:model="stars"/></li>
    @error('stars') <span class="error">{{ $message }}</span> @enderror
 
    <li>Comment: <input type="text" wire:model="comment"/></li>
    @error('comment') <span class="error">{{ $message }}</span> @enderror
 
    <button type="submit">Post</button>
</form>



<h2>Reviews for Car</h2>

@foreach ($reviews as $review)
    <h3></h3>
        <table style="width:50%">
        <tr>
            <th>Review ID:</th>
            <td><a href="{{route('reviews.show', ['id' => $review->id])}}" >
                {{$review->id}}</a></td>
        </tr>
        <tr>
            @foreach ($users as $user)
                @if ($user->id == $review->user_id)
                    <th>User:</th>
                    <td><a href="{{route('users.show', ['id' => $user->id])}}">
                    {{$user->name}}</a></td>
                @endif
            @endforeach 
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
</div>
