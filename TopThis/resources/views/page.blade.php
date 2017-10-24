@extends('layouts.layout_main')

@section('content')

<div Style="min-height: 700px;">
      @if (session()->has('message'))
      <div class="alert alert-success">
         {{ session()->get('message') }}
      </div>
      @endif

      <div Style="position:relative;">
         <div class="panel-heading">
            <input type=checkbox id="show">
            <label for="show"><p Style="font-size: 25px;">Page name :{!! $one !!} </p></label>  
            <span id="content_com"><p>  Main page : {!! $page->mainpage->name !!}&nbsp |&nbsp  Title : {{$page->title}}&nbsp| &nbsp   Body : {{$page->body}}</p></span>  
         </div>
         <div Style="margin-left:20px;"><p>tops on this category:</p></div>
         <br>
         <button onclick="myFunction1()">Try it</button>

         <div id="ds">
            This is my DIV element.
            @foreach($tops as $top)    
            <div class="top-heading" onclick="show({{$top->id}})">                    
               <div Style="margin-left:20px;">{{$top->title}}</div>
               <div Style="margin-left:20px;">{{$top->body}}</div>               
            </div> 

              
            <button  onclick="show({{$top->id}})">Show {{$top->id}}</button>
            <div id="idi{{$top->id}}" class="ascunde">
               <br><br>
            {{Form::open(['route'=>['comment.store',$top->id],'method'=>'POST'])}}                  
            {{Form::text('user','user')}}                         
            {{Form::text('email','Email')}} <br>                 
            {{Form::textarea('body','Comment')}}<br>
            {{Form::submit('Comment')}}    
            {{ Form::close() }} 
                            
               @foreach($top->comments as $comment)
               <br>
               <div class="wrapper_com">
                  <div class="picture_com">picture</div>
                  <div class="header_com">{{$comment->user}}</div>
                  <div class="content_com"><p>{{$comment->body}} </p>
                  </div>
                  <div class="footer_com">
                     <button>New comment</button>
                     <button>Replay</button>  
                  </div>
                  <div class="up"> <p>21 <a href="">&#8657</a></p></div>
                  <div class="down"> <p>31 <a href="">&#8659</a></p></div>    

               </div>
               @endforeach 
            </div>
            <br>
            @endforeach 
         </div>

         @if (session()->has('message'))
         <div class="alert alert-success">
            {{ session()->get('message') }}
         </div>
         @endif

         <br>
      </div>
      </div>

@endsection
