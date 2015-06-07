@extends('myPage.homemasterview')
@section('title')
Neue Frage
@stop
@section('fragefb')
Neue Frage
@stop
@section('active')
                <li><a href="{{ action('TeacherController@getIndex')}}">Home</a>
                </li>
                <li><a href="#">Meine Fragen</a>
                </li>
                <li><a href="{{ action('TeacherController@getFeedback')}}">Feedback</a>
                </li>
                <li><a href="{{ action('TeacherController@getProfile')}}">Profil</a>
                </li>
                <li><a href="{{ action('TeacherController@getSettings')}}">Einstellungen</a>
                </li>
@stop
<div class="row">
    <div class="hidden-xs col-md-4 col-lg-4">
    </div>
    <div class="col-md-4 col-lg-4">
        <div class="fenster">
            <p>
            Frage:<br>
            <input type="text" />
            </p>
            <p>
           Beschreibung:<br>
           <textarea rows="6" placeholder=" ...optional"></textarea>
           </p>
            <p style="text-align:right;">
                <button class="btn btn-default">
                    Absenden
                </button>
            </p>
        </div>
    </div>
</div>