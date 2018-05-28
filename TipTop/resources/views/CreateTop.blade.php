@extends('layouts.app')

@section('content')

<div style=" margin: auto;width: 50%;">
<a> {{$Pageid}} </a>
    <div class="form-inline">
        {{Form::open(['route'=>'top.store','method'=>'POST'])}}


        
        {{Form::hidden('page_id',$Pageid)}}
    </div>

    <div class="form-inline">
        {{Form::label('titletop','Insert the Title:')}}
        {{Form::text('titletop','Title',['class'=>'form-control'])}}
    </div>
    <div class="form-inline">
        {{Form::label('bodytop','Body info:')}}
        {{Form::textarea('bodytop','Body',['class'=>'form-control','rows'=>'7'])}}
    </div>
    
   
    {{Form::submit('Add top',['class'=>'btn btn-primary'])}}    


    {{ Form::close() }}


</div>   

@endsection