<!DOCTYPE html>
<html>
<head>
	<title>@yield('title') - ALFONS</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body class="alfons2">
<div id="home-bootstrap-menu" class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href=".">ALFONS</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">
                @yield('active')
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                <li><a href="{{ action('Auth\LogoutController@anyIndex') }}">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
@yield('content')
<nav class="navbar navbar-custom navbar-fixed-bottom">
	<div class="navbar-header">
      <a class="navbar-brand foot" href="/impressum"><u>Impressum</u></a>
    </div>
</nav>
</body>
</html>