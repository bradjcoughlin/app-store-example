<!DOCTYPE html>
<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
  </head>
  
  <body class="@yield('bodyClass')">

    <div id="app">
        <navigation></navigation>
        <div class="container-fluid">
            <router-view></router-view>
        </div>
    </div>
    
    <!-- Include Symphony's Client Extension API javascript -->
    <script type="text/javascript" src="https://symphony.com/resources/api/v1.0/symphony-api.js" charset="utf-8"></script>
    <script src="{{ elixir('js/app.js') }}"></script>
    
  </body>
</html>