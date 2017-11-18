@extends('layouts.app') @section('content')
<div class="container newSection">
    {!! Form::open(['action'=>'ForumController@store' , 'method'=>'POST']) !!}
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Create New Forum </h3>
        </div>

        <div class="panel-body">

            <div class="form-group{{ $errors->has('f_title') ? ' has-error' : '' }}">
                {{Form::label('f_title', 'Title' ,['class'=>'control-label'])}} 
                {{Form::text('f_title', '', ['placeholder'=>'Enter your Title here', 'class'=>'form-control','required'])}}
                    @if ($errors->has('f_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('f_title') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group {{$errors->has('description') ? ' has-error' : '' }}">
                {{Form::label('description', 'Description' ,['class'=>'control-label'])}} 
                {{Form::textarea('description', '', ['placeholder'=>'Enter your Description here', 'class'=>'form-control','required'])}}
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                {{Form::submit('Create' , ['class'=>'btn btn-labeled btn-success'])}}
            </div>
        </div>
        {{Form::token()}} 
    {!! Form::close() !!}

</div>

@endsection