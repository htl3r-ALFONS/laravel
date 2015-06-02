@extends('myPage.homemasterview')
@section('title')
Home
@stop
@section('fragefb')
Neue Frage
@stop
@section('active')
<li><a href="teachers">Home</a>
                </li>
                <li class="active"><a href="#">Meine Fragen</a>
                </li>
                <li><a href="feedback">Feedback</a>
                </li>
                <li><a href="profilteacher">Profil</a>
                </li>
@stop
<div class="row">
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>
    <div class="col-md-6 col-lg-6">
        <h1>Meine Fragen </h1>
        <div class="frage">
            <h2>Fragen:</h2>
            <h3>Wie kann ich meinen Unterricht noch verbessern?</h3>
        <div class="antworten">
                <h2>Antworten:</h2>
                <h4><a>KampfBaum:</a> Indem Sie mehr Beispiele einbauen.</h4>
                <h4><a>Blockfisch7:</a> Indem Sie sich mehr Zeit für einzelne Schüler nehmen die nicht viel können.</h4>
            </div>    
    </div>
        
        
    
</div>
</div>