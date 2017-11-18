@extends('layouts.app') 
@section('content')
<div class="container newSection">
<table class="table table-user-information">
    <tbody>
        <tr>
            <td>Name</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td>Hire date:</td>
            <td>{{$user->created_at}}</td>
        </tr>

        <tr>
            <td>Email</td>
            <td>
                <a href="mailto:{{$user->email}}">{{$user->email}}</a>
            </td>
        </tr>
                <tr>
            <td>Your posts</td>
            <td>{{count($user->posts)}}</td>
        </tr>
        <tr>
            <td>comment</td>
            <td>{{count($user->comments)}}</td>
        </tr>

    </tbody>
</table>

<a href="/users/{{$user->id}}/edit" class="btn btn-primary pull-right">Edit your Profile</a>
</div>
@endsection