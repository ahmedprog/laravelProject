@extends('layouts.app') @section('content')
<div class="container newSection">
    {!! Form::open(['action'=>'PostController@store' , 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Create New Post in {{$forum->f_title}}</h3>
        </div>

        <div class="panel-body">

            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                {{Form::label('subject', 'Subject' ,['class'=>'control-label'])}} 
                {{Form::text('subject', '', ['placeholder'=>'Enter your Subject here', 'class'=>'form-control','required'])}}
                    @if ($errors->has('subject'))
                        <span class="help-block">
                            <strong>{{ $errors->first('subject') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                {{Form::label('body', 'Description' ,['class'=>'control-label'])}} 
                {{Form::textarea('body', '', ['placeholder'=>'Enter your Description here', 'class'=>'form-control','required'])}}
                @if ($errors->has('body'))
                    <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
            </div>
                <div class="form-group{{ $errors->has('post_photo') ? ' has-error' : '' }}">
                    {{Form::label('body', 'Description' ,['class'=>'control-label'])}} *Not required 
                    {{Form::file('post_photo', ['class'=>'form-control'])}}
                    @if ($errors->has('post_photo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('post_photo') }}</strong>
                        </span>
                    @endif
                </div>
                {{Form::hidden('forum_id',$forum->id )}}

            <div class="col-xs-6 col-sm-6 col-md-6">
                {{Form::submit('Create' , ['class'=>'btn btn-labeled btn-success'])}}
            </div>
        </div>
    
    {{Form::token()}} {!! Form::close() !!}

</div>

@endsection