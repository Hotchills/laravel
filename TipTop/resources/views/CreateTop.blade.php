@extends('layouts.app')

@section('content')

<div style=" margin: auto;width: 50%;">

    <div class="form-inline">
        {{Form::open(['route'=>'top.store','method'=>'POST'])}}

        {{Form::label('page_id','Insert  Page id:')}}
        {{Form::text('page_id','1',['class'=>'form-control'])}}
    </div>

    <div class="form-inline">
        {{Form::label('title','Insert the Title:')}}
        {{Form::text('title','Title',['class'=>'form-control'])}}
    </div>
    <div class="form-inline">
        {{Form::label('body','Body info:')}}
        {{Form::textarea('body','Body',['class'=>'form-control','rows'=>'7'])}}
    </div>
    {{Form::submit('Add top',['class'=>'btn btn-primary'])}}    


    {{ Form::close() }}


</div>   

@endsection