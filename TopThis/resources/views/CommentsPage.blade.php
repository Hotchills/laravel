

@foreach($top->show($top) as $comment)
<br>
<div class="wrapper_com">              
    <div class="picture_com">picture</div>
    <div class="header_com"><h4>{{$comment->user->name}}<span> - is the ID:{{$comment->id}}</span></h4></div>
    <div class="content_com"><p>{!! nl2br(e($comment->body)) !!}</p></div>
    <div class="footer_com">
        <button onclick="open_comments({{$top->id}})"><a href="#tag">New comment</a></button>
        @if(Auth::user()->name != $comment->user->name)
        <button onclick="show_commentreplay({{$comment->id}})">Replay</button>  
        @else
        <button onclick="deletecomment({{$comment->id}})" >Delete</button>
        <button onclick="editcomment({{$comment->id}})" >Edit</button>
        @endif
    </div>
    <button onclick="upvotecomment({{$comment->id}},{{$comment->up_vote}})" type="button" class="up"><span id="up_vote_comment{{$comment->id}}" >{{$comment->up_vote}}</span><span Style="color:#1E9E1E; font-size:150%;">&#8657 </span></button>
    <button onclick="downvotecomment({{$comment->id}},{{$comment->down_vote}})" type="button" class="down"> <span id="down_vote_comment{{$comment->id}}" >{{$comment->down_vote}}</span> <span Style="color:#ff0000; font-size:150%;">&#8659 </span></button>                   
</div>
<button id="show_comment_children_button{{$comment->id}}" onclick="show_comment_children({{$comment->id}})">View all replies &#10549;</button>
<div id="show_comment_children{{$comment->id}}" Style="display:none;">
    @foreach($comment->showreplays($comment) as $replaycomment)

    <div class="wrapper_com" Style="margin-left:60px; width:90%;">              
        <div class="picture_com">picture</div>
        <div class="header_com"><h4>{{$replaycomment->user->name}}<span> - is the ID:{{$replaycomment->id}}</span></h4></div>
        <div class="content_com"><p>{!! nl2br(e($replaycomment->body))!!}</p></div>
        <div class="footer_com">
            <button onclick="open_comments({{$top->id}})"><a href="#tag">New comment</a></button>
            @if(Auth::user()->name != $replaycomment->user->name)
            <button Style="background: #00BFFF;" onclick="show_commentreplay({{$comment->id}})">Replay</button>                      
            @else
            <button onclick="deletecomment({{ $replaycomment->id}})" >Delete</button>
            <button onclick="editcomment({{$replaycomment->id}})">Edit</button>
            @endif
        </div>
        <button type="button" class="up"  onclick="upvotecomment({{$replaycomment->id}},{{$replaycomment->up_vote}})" ><span id="up_vote_comment{{$replaycomment->id}}" >{{$replaycomment->up_vote}}</span> <span Style="color:#1E9E1E; font-size:150%;">&#8657 </span></button> 
        <button type="button" class="down" onclick="downvotecomment({{$replaycomment->id }},{{$replaycomment->down_vote}})"> <span id="down_vote_comment{{$replaycomment->id}}" >{{$replaycomment->down_vote }} </span> <span Style="color:#ff0000; font-size:150%;">&#8659 </span></p></button>                   
    </div>

    @endforeach 


    <div id="replay{{$comment->id}}" class="newcommentarea" Style="display:none;margin-left:50px;width:90%;">  
        <p>{{Auth::user()->name}} replay for the parent comment from-> {{$comment->user->name}}</p>
        {{ Form::open(['route'=>['comment.storereplay',$top->id,$comment->id],'method'=>'POST'])}}                               
        {{ Form::textarea('body','Comment')}}<br>
        {{ Form::submit('Comment')}}    
        {{ Form::close() }} 
    </div>  
</div>
<div class="clear"></div>
@endforeach 

            @include('pagination.pagination_stats', ['paginator' => $top->show($top)])
            {{ $top->show($top)->appends(['top' => $tops->currentPage()])->links('pagination.pagination_links2') }}

