@extends('myPage.homemasterview')
@section('title')
Lehrerauswahl
@stop
@section('fragefb')
Neues Feedback
@stop
@section('active')
                <li><a href=".">Home</a>
                </li>
                <li><a href="feedback">Mein Feedback</a>
                </li>
                <li><a href="settings">Einstellungen</a>
                </li>
@stop
<div class="row">
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>
    <div class="col-md-6 col-lg-6">
        <h1>Liste aller Lehrer: <small>Für Feedback Lehrer auswählen</small></h1>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
            <input type="text" class="form-control" placeholder="Suchen ...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Los!</button>
            </span>
        </div>
        <br>
        
<div class="list-group">
    @foreach ($teachers as $teacher)
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">{{ $teacher->name }}</h4>
            <p class="list-group-item-text">{{ $teacher->description }}</p>
            <p class="list-group-item-text">Email-Adresse: {{ $teacher->email }}</p>
        </a>
    @endforeach   
</div>
    </div>
    </div>