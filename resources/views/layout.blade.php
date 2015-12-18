<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flora The Explorer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    @yield('sheets')
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Flora The Explorer <span class="glyphicon glyphicon-leaf"></span></a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="nav navbar-nav navbar-right">
                @if(auth()->guest())
                    @if(!Request::is('auth/login'))
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    @endif
                    @if(!Request::is('auth/register'))
                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->f_name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            @if(auth()->user()->is_admin)
                                <li><a href="{{ url('/admin') }}"><span class="glyphicon glyphicon-dashboard text-success"></span> Admin Dash</a></li>
                            @endif
                            <li><a href="{{ url('/observations/create') }}"><span class="glyphicon glyphicon-pencil text-success"></span> New Observation</a></li>
                            <li><a href="{{ url('/observations') }}"><span class="glyphicon glyphicon-eye-open text-success"></span> My Observations</a></li>
                            <li><a href="{{ url('/profile') }}"><span class="glyphicon glyphicon-user text-success"></span> Profile</a></li>
                            <li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-log-out text-success"></span> Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 text-center">
            <img src="/img/logo.jpg" alt="Flora The Explorer">
        </div>
    </div>
    @yield('content')
    <div class="footer text-center">
        <hr>
        &#169; {{date('o')}}
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    @yield('footer')
</body>
</html>