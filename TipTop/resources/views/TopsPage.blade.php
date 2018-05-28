
<div class="showtops row" id="clickdoc" Style="position:relative; border:1px solid black;padding:0px;margin: 0px;">
    
@if ($page->page_type == 0)    
    <div class="col-xs-6" style="border:0px solid red;padding:0px;margin: 0px;">
        <span class="imdbRatingPlugin" data-user="ur55406216" data-title="tt2224026" data-style="p3">

            @foreach($tops as $top)    
            <div id="top_nr{{$top->id}}" class="top-heading">                    
                <h1>{{$top->title}}</h1> 
                <br>

                <p >{{$top->body}}</p>  
                <a href="/{{$main}}/{{$page->name}}/{{$top->title}}"> View page </a>
                <div class="btn-group">   
                    <button  type="button" class="btn btn-success up-top btn-sm" id="up-vote-top{{$top->id}}"><span id="nr-up-vote-top{{$top->id}}">{{$top->upvotestop()}} </span><span Style="color:white; ">&#8657 </span></button>
                    <button  type="button" class="btn btn-danger down-top btn-sm" id="down-vote-top{{$top->id}}"><span id="nr-down-vote-top{{$top->id}}"> {{$top->downvotestop()}}</span> <span Style="color:white;">&#8659 </span></button>                   
                </div>
            </div> 
            <div class="commentid col-xs-6 " Style="padding-right: 0px;">
                <div id="idi{{$top->id}}" class="ascunde" >
                    <div class="row">
                        <div class="col-xs-12">
                            <p>{{$top->title}}</p>  
                        </div></div>

                    <div class="row ">
                        <div class="col-xs-12" style="border:0px solid black;padding:0px;margin:0px;">

                            @guest
                            <p> Please login to add comment</p>
                            @else                         

                            <button class="btn btn-default btn-sm" type="button" data-toggle="collapse" data-target="#ds{{$top->id}}" aria-expanded="false" aria-controls="ds{{$top->id}}">add a new comment {{Auth::user()->name}}</button>
                            <div id="ds{{$top->id}}" class="newcommentarea collapse" >                        
                                <div class="row panel-comment" style="margin:0px;padding:8px; padding-left:0px;padding-right: 0px;top:0px;left:0px;">
                                    <div class="col-xs-12">
                                        {{ Form::open(['route'=>['comment.store',$top->id],'method'=>'POST'])}}                               
                                        {{Form::textarea('body','Comment',['class'=>'pb-cmnt-textarea'])}}<br>

                                        <div class="form-inline">
                                            {{Form::submit('Comment',['class'=>'btn btn-primary'])}}    
                                        </div>
                                        {{ Form::close() }} 
                                    </div>
                                </div>
                            </div>  
                            @endguest  
                        </div></div>

                    <section class="ShowCommentsClass">

                        <ul class="nav nav-tabs">
                            <li><a href="#">Default</a></li>
                            <li class="active"><a href="#">by Up Vote</a></li>
                            <li><a href="#">by Down Vote</a></li>
                        </ul>

                        <div class="button_comments_Default" id="button_comments_Default{{$top->id}}" ></div>
                        <div class="button_comments_UpVote" id="button_comments_UpVote{{$top->id}}" ></div> 

                        <?php $comments = $top->show(); ?>


                        @foreach($comments as $comment)
                        <br>
                        <div class="row" style="border:0px solid black;">                        
                            <div class="thumbnail">
                                <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                            </div><!-- /thumbnail -->
                            <div class="panel panel-default">
                                <div class="panel-heading" style="margin:0px;padding:2px;padding-left:10px; ">
                                    <strong>{{$comment->user->name}}</strong><span class="text-muted"> - is the ID:{{$comment->id}}</span>
                                </div>
                                <div class="panel-body">{!! nl2br(e($comment->body)) !!}</div>

                                <div class="panel-footer " style="margin:0px;padding:2px;">

                                    <div class="btn-group">   
                                        <button  type="button" class="btn btn-success up-comment btn-sm" id="up-vote-comment{{$comment->id}}"> <span id="nr-up-vote-comment{{$comment->id}}">{{$comment->upvotescomment()}} </span><span Style="color:white; ">&#8657 </span></button>
                                        <button  type="button" class="btn btn-danger down-comment btn-sm" id="down-vote-comment{{$comment->id}}" ><span id="nr-down-vote-comment{{$comment->id}}"> {{$comment->downvotescomment()}}</span> <span Style="color:white;">&#8659 </span></button>                   
                                    </div>
                                    <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#ds{{$top->id}}" aria-expanded="false" aria-controls="ds{{$top->id}}"><a href="#clickdoc" style="color: white;">New comment</a></button>
                                    @guest

                                    @else                         
                                    @if(Auth::user()->name != $comment->user->name)
                                    <button class="btn btn-primary" onclick="show_commentreplay({{$comment->id}})">Replay</button>  
                                    @else
                                    <button type="button" class=" btn btn-warning pull-right btn-sm" onclick="deletecomment({{$comment->id}})" >Delete</button>
                                    <button type="button" class=" btn btn-info pull-right btn-sm" onclick="editcomment({{$comment->id}})" >Edit</button>
                                    @endif
                                    @endguest  

                                </div>
                            </div>  

                        </div>
                        <a href="/{{$main}}/{{$page->name}}/{{$top->title}}" Style="float:right;color:grey;font-weight: bold;">View all replies &#10549;</a>
                        <br>
                        @endforeach 
                    </section>

                </div>
            </div>
            <br>
            @endforeach 
            {{ $tops->links() }}
            </div>

@elseif ($page->page_type == 1)

    <div class="col-xs-6" style="border:0px solid red;padding:0px;margin: 0px;">

            @foreach($tops as $top)    
            <div id="top_nr{{$top->id}}" class="top-heading">                    
                <h1>{{$top->movie->title}}</h1> 
                <br>

                <p>{{ $top->movie->overview}}</p>  
                <a href="/{{$main}}/{{$page->name}}/{{$top->title}}"> View page </a>
                <div class="btn-group">   
                    <button  type="button" class="btn btn-success up-top btn-sm" id="up-vote-top{{$top->id}}"><span id="nr-up-vote-top{{$top->id}}">{{$top->upvotestop()}} </span><span Style="color:white; ">&#8657 </span></button>
                    <button  type="button" class="btn btn-danger down-top btn-sm" id="down-vote-top{{$top->id}}"><span id="nr-down-vote-top{{$top->id}}"> {{$top->downvotestop()}}</span> <span Style="color:white;">&#8659 </span></button>                   
                </div>
            </div> 
            <div class="commentid col-xs-6 " Style="padding-right: 0px;">
                <div id="idi{{$top->id}}" class="ascunde" >
                    <div class="row">
                        <div class="col-xs-12">
                            <p>{{$top->movie->title}}</p>  
                        </div></div>

                    <div class="row ">
                        <div class="col-xs-12" style="border:0px solid black;padding:0px;margin:0px;">

                            @guest
                            <p> Please login to add comment</p>
                            @else                         

                            <button class="btn btn-default btn-sm" type="button" data-toggle="collapse" data-target="#ds{{$top->id}}" aria-expanded="false" aria-controls="ds{{$top->id}}">add a new comment {{Auth::user()->name}}</button>
                            <div id="ds{{$top->id}}" class="newcommentarea collapse" >                        
                                <div class="row panel-comment" style="margin:0px;padding:8px; padding-left:0px;padding-right: 0px;top:0px;left:0px;">
                                    <div class="col-xs-12">
                                        {{ Form::open(['route'=>['comment.store',$top->id],'method'=>'POST'])}}                               
                                        {{Form::textarea('body','Comment',['class'=>'pb-cmnt-textarea'])}}<br>

                                        <div class="form-inline">
                                            {{Form::submit('Comment',['class'=>'btn btn-primary'])}}    
                                        </div>
                                        {{ Form::close() }} 
                                    </div>
                                </div>
                            </div>  
                            @endguest  
                        </div></div>

                    <section class="ShowCommentsClass">

                        <ul class="nav nav-tabs">
                            <li><a href="#">Default</a></li>
                            <li class="active"><a href="#">by Up Vote</a></li>
                            <li><a href="#">by Down Vote</a></li>
                        </ul>

                        <div class="button_comments_Default" id="button_comments_Default{{$top->id}}" ></div>
                        <div class="button_comments_UpVote" id="button_comments_UpVote{{$top->id}}" ></div> 

                        <?php $comments = $top->show(); ?>


                        @foreach($comments as $comment)
                        <br>
                        <div class="row" style="border:0px solid black;">                        
                            <div class="thumbnail">
                                <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                            </div><!-- /thumbnail -->
                            <div class="panel panel-default">
                                <div class="panel-heading" style="margin:0px;padding:2px;padding-left:10px; ">
                                    <strong>{{$comment->user->name}}</strong><span class="text-muted"> - is the ID:{{$comment->id}}</span>
                                </div>
                                <div class="panel-body">{!! nl2br(e($comment->body)) !!}</div>

                                <div class="panel-footer " style="margin:0px;padding:2px;">

                                    <div class="btn-group">   
                                        <button  type="button" class="btn btn-success up-comment btn-sm" id="up-vote-comment{{$comment->id}}"> <span id="nr-up-vote-comment{{$comment->id}}">{{$comment->upvotescomment()}} </span><span Style="color:white; ">&#8657 </span></button>
                                        <button  type="button" class="btn btn-danger down-comment btn-sm" id="down-vote-comment{{$comment->id}}" ><span id="nr-down-vote-comment{{$comment->id}}"> {{$comment->downvotescomment()}}</span> <span Style="color:white;">&#8659 </span></button>                   
                                    </div>
                                    <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#ds{{$top->id}}" aria-expanded="false" aria-controls="ds{{$top->id}}"><a href="#clickdoc" style="color: white;">New comment</a></button>
                                    @guest

                                    @else                         
                                    @if(Auth::user()->name != $comment->user->name)
                                    <button class="btn btn-primary" onclick="show_commentreplay({{$comment->id}})">Replay</button>  
                                    @else
                                    <button type="button" class=" btn btn-warning pull-right btn-sm" onclick="deletecomment({{$comment->id}})" >Delete</button>
                                    <button type="button" class=" btn btn-info pull-right btn-sm" onclick="editcomment({{$comment->id}})" >Edit</button>
                                    @endif
                                    @endguest  

                                </div>
                            </div>  

                        </div>
                        <a href="/{{$main}}/{{$page->name}}/{{$top->title}}" Style="float:right;color:grey;font-weight: bold;">View all replies &#10549;</a>
                        <br>
                        @endforeach 
                    </section>

                </div>
            </div>
            <br>
            @endforeach 
            {{ $tops->links() }}
            </div>


@endif