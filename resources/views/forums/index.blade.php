@extends('layouts.app') 
@section('content')
    <div class="container newSection">
        <div class="row">

            @foreach ($forums as $forum)
                    <div class="col-sm-12">
                        <div class="panel panel-default panel-front">
                            <div class="panel-body">
                                <h4 class="text-uppercase"> {{$forum->f_title}}</h4>
                                    {{$forum->description}}
                                <div>
                                     <span class="label label-warning">Posts  {{ count($forum->posts)}}</span>

                                    <div class="pull-right">
                                        <a href="forums/{{$forum->id}}" class="btn btn-info btn-sm" role="button">Show Posts</a>
                                       @if(!Auth::guest())
                                        <a href="posts/create/{{$forum->id}}" class="btn btn-success btn-sm" role="button">New Post</a>
                                        @endif
                                    </div>
                            </div>     
                            </div>
                        </div>
                    </div>
            @endforeach
    @if(!Auth::guest())
    <a href="forums/create" class="btn btn-success btn-sm pull-right" role="button">New Forum</a>
    @endif
        </div>
    </div>
@endsection