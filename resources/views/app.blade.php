<!DOCTYPE html>
<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  </head>
  
  <body class="@yield('bodyClass')">

    <div id="app">
        <navigation></navigation>
        <router-view></router-view>
        <bottom></bottom>
    </div>
    
    <script src="{{ elixir('js/app.js') }}"></script>
    
  </body>
</html>