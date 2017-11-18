{{--
<a href="/comment/{{$comment->id}}/edit" class="pull-right btn  btn-link" role="button">Edit comment</a> --}}
<div class="container">
    <!-- Trigger the modal with a button -->
    <button type="button" class="pull-right btn sendId btn-link" data-toggle="modal" data-id='{{$comment->id}}'data-comment='{{$comment->comment}}'  data-target="#myModal">Edit Comment</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Your Comment</h4>
                </div>
                <div class="modal-body">
                    <form role="form" id="editComment" action="{{ action('CommentController@update',$comment->id) }}" method="post">
                        <div class="form-group {{ $errors->has('comment') ? ' has-error' : '' }}">
                            <textarea class="form-control" id="valComment"  name="comment" rows="3" required></textarea>
                            @if ($errors->has('comment'))
                            <span class="help-block">
                                <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                            @endif
                        </div>
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                         {{--<input type="hidden" name="user_id" value="{{Auth::user()->id}}"> --}} {{Form::token()}}
                        <button type="submit" class="btn btn-success pull-right">Edit</button>
                        {{ csrf_field() }}
                        {{ Form::hidden('_method', 'PUT') }}
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>