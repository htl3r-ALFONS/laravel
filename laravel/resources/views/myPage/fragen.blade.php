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
    </div>
    
</div>