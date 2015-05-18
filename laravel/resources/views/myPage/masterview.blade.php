<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body class="alfons2">
<nav class="navbar navbar-custom navbar-fixed-top">
	<div class="navbar-header">
      <a class="navbar-brand head" href=".">ALFONS</a>
    </div>
</nav>
<nav class="navbar navbar-custom navbar-fixed-bottom">
	<div class="navbar-header">
      <a class="navbar-brand foot" href="."><u>Impressum</u></a>
    </div>
</nav>
@yield('content')
</body>
</html>