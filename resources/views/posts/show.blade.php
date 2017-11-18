@extends('layouts.app') @section('content')
<div class="container newSection">
    <div class="row">                   
        <div class="col-md-3">
         <img src="/uploads/post_photo/{{$post->photo}}"  class="img-responsive" alt="{{$post->subject}} Photo" > 
        </div>
        <div class="col-md-9">
            
                <img src="/uploads/user_photo/{{ $post->user->picture }}" class="img-circle" width="75" height="75">
                <span class="label label-info">By {{$post->user->name}}</span>
            <h1 >{{$post->subject}}</h1>                
            <p>{{$post->body}}</p>
            <div>
                @if(!Auth::guest())
                    @if($post->user->id === Auth::user()->id)
                        {!! Form::open(['action'=>['PostController@destroy',$post->id],'method'=>'POST']) !!}
                        {{ Form::hidden('_method','DELETE') }}
                        {{ Form::submit('Delete', ['class'=>' btn btn-danger pull-right']) }}
                        {!! Form::close() !!}  
                        <a href="/posts/{{$post->id}}/edit" class="pull-right btn  btn-link" role="button">Edit Post</a>
                    @endif
                @endif                
                <div class="pull-left">
                    <span class="badge">Posted {{$post->created_at}}</span>
                    <span class="label label-success">Commetns {{count($post->comments)}}</span>
                    <span class="label label-warning">{{$post->forum->f_title}}</span>
                </div>
            </div>
        </div>
        <hr>
         @include('posts.includes.leavecomment')
    </div>
</div>
</div>
@endsection