@extends('layouts.layout_main')

@section('content')
<body class="BodyOfPage">
<div id="tag" class="firstmain">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <div Style="height:auto;width:100%;position:relative;transform: rotate(0deg);">
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
        <div class="showtops">
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
            
            <section class="ShowCommentsClass">
             @include('CommentsPage')
            </section>
 
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
    @include('pagination.pagination_stats', ['paginator' => $tops])
    {{ $tops->links('pagination.pagination_links') }}
</div>
</body>
@endsection