<!DOCTYPE html>
<html lang="en">
    <head>
        <title>List of employees</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ Session::token() }}">

        <link rel="icon" type="image/ico" href="/favicon.ico" />

        <script type="text/javascript" src="/js/jquery.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/angular.min.js"></script>
        <script type="text/javascript" src="/js/app.js"></script>

        <link rel="stylesheet" href="/css/jquery-ui.min.css" type="text/css" media="all" />
        <link rel="stylesheet" href="/css/app.css" type="text/css" media="all" />


    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                      <li><a href="/">Home</a></li>
                      @if(Auth::check())
                      <li><a href="/admin">Admin</a></li>
                      <li><a>{{ \Auth::user()->email }}</a></li>
                      <li><a href="/logout">Logout</a></li>
                      @else
                      <li><a href="/login">Sign in</a></li>
                      @endif
                    </ul>
                </div>
            </nav>
        </div>
        @yield('content')
    </body>
</html>