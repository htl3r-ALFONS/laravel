@extends('myPage.homemasterview')

<div class="padding">
    <h1>Log in</h1>
    <p class="bold">Verwende deinen Benutzernamen und dein Passwort wenn du ein Schüler bist.<br>Bist du ein Lehrer, verwende deine Emailadresse<br>Wenn du dein Passwort vergessen hast, klick hier</p>
    
        <div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
  <input type="text" class="form-control" placeholder="Benutzername/Emailadresse" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
  <input type="password" class="form-control" placeholder="password" aria-describedby="basic-addon1">
        </div>
        <button type="button" class="btn btn-primary btn-block">Login</button>
</div>