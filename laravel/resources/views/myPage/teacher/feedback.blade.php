@extends('myPage.homemasterview')
@section('title')
Home
@stop
@section('fragefb')
Neue Frage
@stop
@section('active')
<li><a href="/teacher">Home</a>
                </li>
                <li><a href="{{ action('TeacherController@getFrage')}}">Meine Fragen</a>
                </li>
                <li  class="active"><a href="#">Feedback</a>
                </li>
                <li><a href="{{ action('TeacherController@getProfile')}}">Profil</a>
                </li>
                <li><a href="{{ action('TeacherController@getSettings')}}">Einstellungen</a>
                </li>
@stop
<div class="row">
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>
    <div class="col-md-6 col-lg-6">
        <h1>Willkommen! </h1>
    </div>
    
</div>