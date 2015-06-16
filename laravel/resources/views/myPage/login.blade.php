@extends('myPage.masterview')
<!--- TODO: 2. login für lehrer -->

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="loginposition">
    

<!--Schüler Login -->
<div class="login_form">
    <h1>Schüler</h1>
    <p class="bold">Verwende deinen Fischnamen und dein Passwort</p>
      
    <form action="{{ action('Auth\LoginController@postStudent') }}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
        <input name="fishname" type="text" class="form-control" placeholder="Fischname" aria-describedby="basic-addon1">
      </div>
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
        <input name="password" type="password" class="form-control" placeholder="password" aria-describedby="basic-addon1">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
      
</div>


<!--Lehrer Login -->

<div class="login_form">
    <h1>Lehrer</h1>
    <p class="bold">Verwenden Sie ihre Emailadresse und ihr Passwort</p>
    <form action="{{ action('Auth\LoginController@postTeacher') }}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
        <input name="email" type="text" class="form-control" placeholder="Emailadresse" aria-describedby="basic-addon1">
      </div>
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
        <input name="password" type="password" class="form-control" placeholder="password" aria-describedby="basic-addon1">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>  
</div>
    
   </div>
