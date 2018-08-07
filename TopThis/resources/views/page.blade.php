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