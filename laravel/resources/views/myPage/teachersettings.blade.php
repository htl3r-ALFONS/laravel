@extends('myPage.homemasterview')
@section('title')
Einstellungen
@stop
@section('fragefb')
Neue Frage
@stop
@section('active')
                <li><a href="students">Home</a>
                </li>
                <li><a href="feedback">Mein Feedback</a>
                </li>
                <li class="active"><a href="settings">Einstellungen</a>
                </li>
@stop
<div class="row">
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>
    <div class="col-md-6 col-lg-6">
        <h1>Profilbild ändern</h1>
        <img style="border-radius:10px;" src="http://resizing.flixster.com/A2P0n8pchbLpHcOxVO4_SVqdr9g=/280x250/dkpu1ddg7pbsk.cloudfront.net/rtactor/40/90/40900_ori.jpg" alt="Jonah Hill" width="300px;">
        <form>
            <div style="margin:10px;" class="input-group">
                <input type="text" class="form-control" placeholder="File auswählen">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Profilbild aktualisiern</button>
                </span>
            </div>
        </form>
    </div>            
</div>
<div class="row">
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>
    <div class="col-md-6 col-lg-6">
        <h1>Email-Adresse ändern</h1>
        <div class="chgPw">
            <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            <input type="text" disabled value="jonahhill@gmx.com" placeholder="Altes Passwort" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            <input type="text" placeholder="Neue Email-Adresse" class="form-control">
        </div>
        <button type="button" class="btn btn-success btn-block">Email-Adresse ändern</button>
        </div>            
    </div>
</div>
<div class="row">
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>
    <div class="col-md-6 col-lg-6">
        <h1>Passwort ändern</h1>
        <div class="chgPw">
            <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="password" placeholder="Altes Passwort" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="password" placeholder="Neues Passwort" class="form-control">
        </div>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            <input type="password" placeholder="Neues Passwort wiederholen" class="form-control">
        </div>
        <button type="button" class="btn btn-success btn-block">Passwort ändern</button>
        </div>            
    </div>
</div>