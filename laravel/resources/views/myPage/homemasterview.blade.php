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
                <li><button type="button" class="btn new btn-info"><span class="glyphicon glyphicon-pencil"></span> @yield('fragefb')</button>
                </li>
            </ul>
        </div>
    </div>
</div>
@yield('content')
    <div class="row">
        <div class="col-md-3 col-lg-3">
    </div>
    <div class="col-md-6 col-lg-6">
        <a src="#">Impressum</a>
    </div>
    <div class="col-md-3 col-lg-3">
        </div>
    </div>
</body>
</html>