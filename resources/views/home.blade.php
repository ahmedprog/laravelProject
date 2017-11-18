@extends('layouts.app') @section('content')
<div class="container newSection">
    <div class="row">
        <div class="col-md-8 ">
                <h1>All Posts</h1>
                <div >
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container newSection">
                        <div class="row">
                            <div class="col-md-8 ">
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
                            <div class="col-md-4 ">

                                <!-- Begin fluid  width widget -->
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <span class="glyphicon glyphicon-list-alt"></span>  Recent Posts
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <ul class="media-list">
                                            @foreach($RecPosts as $RecPost)                                                
                                            <li class="media">
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a href="#" class="text-info">Posted {{$RecPost->created_at}}</a>
                                                    </h4>
                                                    <p class="margin-top-10 margin-bottom-20">{{$RecPost->subject}}</p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>

                                        <!-- <a href="#" class="btn btn-default btn-block">More Blog Posts »</a> -->
                                    </div>
                                </div>
                                <!-- End fluid width widget -->

                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
</div>
@endsection