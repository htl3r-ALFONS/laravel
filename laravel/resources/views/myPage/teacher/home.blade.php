@extends('myPage.homemasterview')
@section('title')
Home
@stop
@section('fragefb')
Neue Frage
@stop
@section('active')
<li class="active"><a href="{{ action('TeacherController@getIndex')}}">Home</a>
                </li>
                <li><a href="{{ action('TeacherController@getFrage')}}">Meine Fragen</a>
                </li>
                <li><a href="{{ action('TeacherController@getFeedback')}}">Feedback</a>
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
        
        <div class="feedbackbox">
            <h2>Feedbacks:</h2>
            
            <div class="feedback">
            <h5><b>Blockfisch7:</b></h5>
            <p>Yo Prof ich finde ihr Unterricht könnte etwas mehr musikalische Untermalung vertragen peace</p>    
            </div>
            <div class="comment teachercomment">
                <p><b>Ich:</b> Euch verdammte Hippies brauch ich im Unterricht nicht!</p>
            </div>
            
            <div class="comment">
                <p><b>Blockfisch7:</b> Diese Art unkonstruktive Reaktion hilft wirklich niemanden!</p>
            </div>
            <div class="input-group feedbackbox">
                <input type="text" class="form-control" placeholder="kommentieren...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Senden</button>
                </span>
            </div>
        </div>

        <div class="frage">
            <h2>Frage:</h2>
            <h3>Wie kann ich meinen Unterricht noch verbessern?</h3>
        
            <div class="feedback">
                <h2>Antworten:</h2>
                <h4><a>KampfBaum:</a> Indem Sie mehr Beispiele einbauen.</h4>
                <h4><a>Blockfisch7:</a> Indem Sie sich mehr Zeit für einzelne Schüler nehmen die nicht viel können.</h4>
            </div>
            
        
         <div class="input-group feedbackbox">
                <input type="text" class="form-control" placeholder="Antwort">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Senden</button>
                </span>
            </div>
       
        </div>
        
    </div>
    
</div>