@extends('layouts.app') 

@section('content')
     @guest  
        <h1 class="text-center">Welcome IN Our Blog pleace registar to show and create  Posts </h1>
    @else

    <h1 class="text-center">    Welcome {{ Auth::user()->name }} </h1>
    @endguest

    @endsection