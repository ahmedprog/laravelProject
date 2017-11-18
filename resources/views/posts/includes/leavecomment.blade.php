@if(!Auth::guest())
<h4>Leave a Comment:</h4>
    <form role="form" action="{{ action('CommentController@store') }}" method="post">
        <div class="form-group {{ $errors->has('comment') ? ' has-error' : '' }}">
            <textarea class="form-control" name="comment" rows="3" required></textarea>
            @if ($errors->has('comment'))
                    <span class="help-block">
                        <strong>{{ $errors->first('comment') }}</strong>
                    </span>
                @endif
            </div>
            <input type="hidden" name="post_id" value="{{$post->id}}">
            {{--  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">  --}}
        {{Form::token()}}
        <button type="submit" class="btn btn-success pull-right">Comment</button>
    </form>
    <br><br>
@endif
    <p><span class="badge">{{count($comments)}}</span> Comments:</p><br>
    @if ($comments) 
    @foreach ($comments as $comment)
            <div class="row">
                <div class="col-sm-2 text-center">
                    <img src="/uploads/user_photo/{{ $comment->user->picture }}" class="img-circle" height="65" width="65" alt="Avatar">
                </div>
                <div class="col-sm-10">
                    <h4>By: {{ $comment->user->name}} <small>{{$comment->created_at}}</small></h4>
                    <p>{{$comment->comment}}</p>
                    @if(!Auth::guest())
                        @if ($comment->user_id === Auth::user()->id)
                        {!! Form::open(['action'=>['CommentController@destroy',$comment->id],'method'=>'POST']) !!}
                        {{ Form::hidden('_method','DELETE') }}
                        {{ Form::submit('Delete', ['class'=>' btn btn-danger pull-right']) }}
                        {!! Form::close() !!}                          
                            @if ($comment->user_id === Auth::user()->id) 
                                    @include('posts.includes.commentModel')
                            @endif
                        @endif
                    @endif
                    
                    
                    <br>
                </div>
            </div>
            <hr>
     @endforeach
@endif
</div>
