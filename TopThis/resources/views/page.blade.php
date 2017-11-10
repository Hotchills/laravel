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
            <span id="content_com"><p>  Main page : {!! $page->mainpage->name !!}&nbsp |&nbsp  Title : {{$page->title}}&nbsp| &nbsp   Body : {{$page->body}}</p></span>  
        </div>
        <div Style="margin-left:20px;"><p>tops on this category:</p></div>
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
            <button onclick="show_comments({{$top->id}})">Try it</button>

            <div id="ds{{$top->id}}" Style="border-radius:5px;display:none;width:100%;border:1px solid grey; padding:5px;">              
                {{Form::open(['route'=>['comment.store',$top->id],'method'=>'POST'])}}                  
                {{Form::text('user','user')}}                         
                {{Form::text('email','Email')}} <br>                 
                {{Form::textarea('body','Comment')}}<br>
                {{Form::submit('Comment')}}    
                {{ Form::close() }} 
            </div>     

            @foreach($top->comments as $comment)
            <br>
            <div class="wrapper_com">
                <br>
                <div class="picture_com">picture</div>
                <div class="header_com">{{$comment->user}}</div>
                <div class="content_com"><p>{{$comment->body}} </p></div>
                <div class="footer_com">
                    <button onclick="open_comments({{$top->id}})"><a href="#tag">New comment</a></button>
                    <button>Replay</button>  
                </div>
                <div class="up"> <p>21 <a href="">&#8657</a></p></div>
                <div class="down"> <p>31 <a href="">&#8659</a></p></div>    

            </div>
            @endforeach 
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

</div>
@endsection
