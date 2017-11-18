@extends('layouts.app')
@section('content')
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
  <ul class="list-group">
    <a href="#" class="list-group-item active">
      <br/>
      <br/>
      <i class="glyphicon glyphicon-user"></i> Personal
      <br/>
      <br/>
    </a>
    <a href="#" class="list-group-item">
      <br/>
      <br/>
      <h4 class="glyphicon glyphicon-th-list"></h4> My Activities
      <br/>
      <br/>
    </a>
    <a href="#" class="list-group-item">
      <br/>
      <br/>
      <h4 class="glyphicon glyphicon-link"></h4> Accounts
      <br/>
      <br/>
    </a>
    <a href="#" class="list-group-item">
      <br/>
      <br/>
      <h4 class="glyphicon glyphicon-log-out"></h4> Logout
      <br/>
      <br/>
    </a>
  </ul>
</div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
  <!-- flight section -->
  <div class="bhoechie-tab-content active">
    <center>
      <img src="/uploads/user_photo/{{$user->picture}}" alt="{{$user->picture}}"  class="img-circle" width="150" height="150">
      <h2 style="margin-top: 0;color:#00001a">Welcome {{$user->name}}</h2>
      @include('user.includes.Home')      
    </center>
  </div>
  <div class="bhoechie-tab-content">
    <center>
      <h1 class="glyphicon glyphicon-th-list" style="font-size:12em;color:#00001a"></h1>
      <h2 style="margin-top: 0;color:#00001a">
              @include('user.includes.activities')
      </h2>
    </center>
  </div>
  <div class="bhoechie-tab-content">
    <center>
      <h1 class="glyphicon glyphicon-link" style="font-size:12em;color:#00001a"></h1>
      <h2 style="margin-top: 0;color:#00001a">
      
      {!! Form::open(['action'=>['UserController@destroy',$user->id],'method'=>'POST']) !!}
      {{ Form::hidden('_method','DELETE') }}
      {{ Form::submit('Delete', ['class'=>' btn btn-danger ' ]) }}
      {!! Form::close() !!}  

      </h2>
      <a href="/users/{{$user->id}}" class="btn btn-primary">show Your Profile</a>
      
    </center>
  </div>
  <div class="bhoechie-tab-content">
    <center>
      <h1 class="glyphicon glyphicon-log-out" style="font-size:12em;color:#00001a"></h1>
      <h2 style="margin-top: 0;color:#00001a">
        <a href="" class="btn btn-sm btn-primary btn-block" role="button">Logout</a>
      </h2>
    </center>
  </div>
</div>

  @endsection