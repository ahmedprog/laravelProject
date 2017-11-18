<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Fonts -->
  
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
         @yield('header')

</head>
<body>
    <div id="app">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
            

            @endauth
        </div>
        @endif
            @include('includes.navbar')
            @include('includes.messages')
            @yield('content')
    
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{--  <script src="js/jquery-3.2.1.min.js"></script>  --}}
    <script src="{{ asset('js/mine.js') }}"></script>
        
</body>
</html>
