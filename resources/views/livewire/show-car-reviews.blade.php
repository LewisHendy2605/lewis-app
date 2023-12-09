<div>
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
