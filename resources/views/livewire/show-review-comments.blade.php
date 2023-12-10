<div style="text-align: left">
    <h3>Add a comment</h3>
    
    
    <form wire:submit.prevent="createComment">
        <li>Comment: <input type="text" wire:model="comment"/></li>
        @error('comment') <span class="error">{{ $message }}</span> @enderror
 
        <button type="submit">Post</button>
    </form>
    
    <h3>Comments</h3>
    <br>
        @foreach ($comments as $comment)
            <h2></h2>
            <table style="width:50%"> 
                <tr>
                    <th>Comment ID:</th>
                    <td><a href="{{route('comments.show', ['id' => $comment->id])}}">
                        {{$comment->id}}</a></td>
                </tr>
                <tr>
                    <th>Comment:</th>
                    <td>{{$comment->comment}}</td>
                </tr>
                <tr>
                    <th>User:</th>
                    @foreach ($users as $user)
                        @if ($user->id == $comment->user_id)
                        <td><a href="{{route('users.show', ['id' => $comment->user_id])}}">
                            {{$user->name}}</a></td>
                        @endif
                    @endforeach
                </tr>
                <tr>
                    <th>Review ID:</th>
                    <td>{{$comment->review_id}}</td>
                </tr>
            </table>
        @endforeach

</div>