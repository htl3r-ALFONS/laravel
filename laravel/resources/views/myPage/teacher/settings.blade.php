@extends('myPage.homemasterview')
@section('title')
Einstellungen
@stop
@section('fragefb')
Neue Frage
@stop
@section('active')
                <li><a href="{{ action('TeacherController@getIndex')}}">Home</a>
                </li>
                <li><a href="{{ action('TeacherController@getFrage')}}">Meine Fragen</a>
                </li>
                <li><a href="{{ action('TeacherController@getFeedback')}}">Feedback</a>
                </li>
                <li><a href="{{ action('TeacherController@getAskFrage')}}">Frage erstellen</a>
                </li>
                <li class="active"><a href="{{ action('TeacherController@getSettings')}}">Einstellungen</a>
                </li>
@stop

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