@extends('layouts.layout_main')

@section('content')

<div id="tag" class="firstmain">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <div Style="position:relative;">
        <div class="panel-heading" >
            <input type=checkbox id="show">
            <label for="show"><p Style="font-size: 25px;">Page name :{!! $one !!} </p></label>  
            <span id="content_com" ><p>  Main page : {!! $page->mainpage->name !!}&nbsp |&nbsp  Title : {{$page->title}}&nbsp| &nbsp   Body : {{$page->body}}</p></span>  
        </div>
        
        <h2>Modal Example</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn" onclick="modalfunction()">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal" >
  <!-- Modal content -->
  <div class="modal-content">
    <button class="close" onclick="modalfunctionclose()">&times;</button>
     <p> Alex edit this comment: </p>
    <p>Some text in the Modal..</p>  
    <button class="close" onclick="modalfunctionclose()">Close</button> 
  </div>

</div>
        
        <br>
        <div  Style="margin-left:20px;"><h2>Tops on this category:</h2></div>
        <br>
        @foreach($tops as $top)    
        <div id="top_nr{{$top->id}}" class="top-heading" onclick="show({{$top->id}})">                    
            <h1>{{$top->title}}</h1>
            <br>
            <p >{{$top->body}}</p>               
        </div> 
        <button  onclick="show({{$top->id}})">Show{{$top->id}}</button>
        <div id="idi{{$top->id}}" class="ascunde">
            <h1>{{$top->title}}</h1>             
            <button onclick="show_comments({{$top->id}})">Click to add a new comment</button>
            <div id="ds{{$top->id}}" class="newcommentarea" Style="display:none;">  
                <p>{{Auth::user()->name}}</p>
                {{ Form::open(['route'=>['comment.store',$top->id],'method'=>'POST'])}}                               
                {{Form::textarea('body','Comment')}}<br>
                {{Form::submit('Comment')}}    
                {{ Form::close() }} 
            </div>     
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
            @endforeach 
            @include('pagination.pagination_stats', ['paginator' => $top->show($top)])
            {{ $top->show($top)->appends(['top' => $tops->currentPage()])->links('pagination.pagination_links') }}
        </div>
        <br>
        @endforeach 

        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <br>
    </div>
    @include('pagination.pagination_stats', ['paginator' => $tops])
    {{ $tops->links('pagination.pagination_links') }}

</div>
@endsection