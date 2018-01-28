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

            <!-- Trigger/Open The Modal
           <button id="myBtn" onclick="modalfunction()">Open Modal</button>  -->

            <!-- The Modal 
            <div id="myModal" class="modal" >
            <!-- Modal content 
            <div class="modal-content">
                <button class="close" onclick="modalfunctionclose()">&times;</button>
                <p> Alex edit this comment: </p>
                <p>Some text in the Modal..</p>  
                <button class="close" onclick="modalfunctionclose()">Close</button> 
            </div>
        </div>
            -->
            <br>
            <div  Style="margin-left:20px;"><h2>Tops on this category:</h2></div>
            <br>

            <section class="ShowTopsClass">
                @include('TopsPage')
            </section>


            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <br>
        </div>

    </div>
</body>
@endsection