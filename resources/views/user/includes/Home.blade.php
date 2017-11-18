<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Upload Your Photo </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/profile">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('user_photo') ? ' has-error' : '' }}">
                    <label for="user_photo" class="col-md-4 control-label">Your Photo</label>
                    <div class="col-md-6">
                        <input id="user_photo" type="file" class="form-control" name="user_photo"> @if ($errors->has('user_photo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user_photo') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Upload
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>