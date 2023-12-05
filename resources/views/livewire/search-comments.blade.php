<div style="text-align: left">
    <h2>Search For Comments</h2>

    <input type="text" wire:model="searchInput" placeholder="Search for Comments....">

    <button wire:click="searchForComment">Search</button>
    <button wire:click="resetArray">Reset</button>

    @foreach ($matchedComments as $comment)
        <h3></h3>
        <table style="width:45%">
            <tr>
                <th><a href="{{route('cars.show', ['id' => $comment->id])}}">
                Comment ID::</a></th>
                <td><a href="{{route('cars.show', ['id' => $comment->id])}}">
                {{$comment->id}}</a></td>
            </tr>
            <tr>
                <th>Comment:</th>
                <td><a href="{{route('cars.show', ['id' => $comment->id])}}">
                    {{$comment->comment}}</a></td>
            </tr>
            <tr>
                <th>Review ID:</th>
                <td><a href="{{route('cars.show', ['id' => $comment->id])}}">
                    {{$comment->review_id}}</a></td>
            </tr>
            <tr>
                <th>User ID:</th>
                <td><a href="{{route('cars.show', ['id' => $comment->id])}}">
                    {{$comment->User_id}}</a></td>
            </tr>
        </table>
    @endforeach

</div>
