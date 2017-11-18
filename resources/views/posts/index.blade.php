@extends('layouts.app') 
@section('content')
<div class="container newSection">
    <div class="row">
        @foreach ($posts as $post)
        <h1>{{$post->subject}}</h1>
        <p>{{$post->body}}</p>
        <div>
            <span class="badge">Posted {{$post->created_at}}</span>
            <span class="label label-primary">Comments  {{ count($post->comments)}}</span>
            <span class="label label-success">{{$post->forum->f_title}}</span>
            <span class="label label-info">{{$post->user->name}}</span>
            <div class="pull-right">
                <a href="/posts/{{$post->id}}" class="btn  btn-link" role="button">More</a>
            </div>
        </div>
        <hr>
        @endforeach
    </div>
</div>
</div>
@endsection