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
        @foreach ($questions as $question)
        <div class="feedbackbox">
            <h4>{{ $question->content }}</h4>
            <div class="feedback">  
            </div>
<!--- ToDo: reparieren-->
    </div>
</div>