@extends('myPage.masterview')
<!--- TODO: 2. login für lehrer -->
<div class="padding">
    <h1>Log in</h1>
    <p class="bold">Verwende deinen Fischnamen und dein Passwort</p>
    <form action="{{ action('Auth\LoginController@postStudent') }}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
        <input name="fishname" type="text" class="form-control" placeholder="Benutzername/Emailadresse" aria-describedby="basic-addon1">
      </div>
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
        <input name="password" type="password" class="form-control" placeholder="password" aria-describedby="basic-addon1">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
</div>