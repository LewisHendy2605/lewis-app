<div style="text-align: left">
   <h2>Comments</h2>
        <br>
        @foreach ($comments as $comment)
            <h2></h2>
            <table style="width:50%"> 
                <tr>
                    <th>Comment ID:</th>
                    <td><a href="{{route('comments.show', ['id' => $comment->id])}}" >
                        {{$comment->id}}</a></td>
                </tr>
                <tr>
                    <th>Comment:</th>
                    <td>{{$comment->comment}}</td>
                </tr>
                <tr>
                    <th>User ID:</th>
                    <td>{{$comment->user_id}}</td>
                </tr>
                <tr>
                    <th>Review ID:</th>
                    <td>{{$comment->review_id}}</td>
                </tr>
            </table>
        @endforeach

</div>