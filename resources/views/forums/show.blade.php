@extends('layouts.app') 
@section('content')
<div class="container-fluid jumbotron newSection">
    <h2 class="text-uppercase ">{{$forum->f_title}}</h2>
    <small class="forum_descr center-block ">{{$forum->description}}</small>
@if(!Auth::guest())
    <a href="/posts/create/{{$forum->id}}" class="btn btn-primary btn-md pull-right" role="button">Add New Post</a>
@endif
</div>
<div class="container">
    @if(count($forum->posts) !== 0 )
    <h2 class='text-center'>We have :
        <b> {{count($forum->posts)}} </b> posts</h2>
    <div class="row">
        @foreach ($forum->posts as $post)
        <div class="col-sm-6">
            <div class="panel panel-default panel-front">
                <div class="panel-body">
                    <h4> {{$post->subject}}</h4>
                    <img src="/uploads/post_photo/{{$post->photo}}" width="275" height="250px" alt="{{$post->subject}}">
                    <div class="text-left">
                        <span class="label label-primary">{{$post->forum->f_title}}</span>
                        <span class="label label-default">{{$post->created_at}}</span>
                        <span class="label label-success">{{$post->user->name}}</span>
                    </div>
                    <div class="text-right">
                        <a href="/posts/{{$post->id}}" class="btn btn-link" role="button">More</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<h3 class="text-center">We do not have any Posts yet</h3>
@endif
</div>
@endsection