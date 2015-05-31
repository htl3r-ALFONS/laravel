@extends('myPage.homemasterview')
@section('title')
Lehrerauswahl
@stop
@section('fragefb')
Neues Feedback
@stop
@section('active')
                <li><a href="students">Home</a>
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
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Prof. Jonah Hill</h4>
    <p class="list-group-item-text">Fächer: BSPK, WIR</p>
  </a>
    <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Fachlehrer Chris Tucker</h4>
    <p class="list-group-item-text">Fächer: WebT, DIM</p>
  </a>
    <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Prof. Jakob Bal</h4>
    <p class="list-group-item-text">Fächer: PQM, E</p>
  </a>
    <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Prof. Mitra Bayandor</h4>
    <p class="list-group-item-text">Fächer: MEDT, PQM</p>
  </a>
    <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Fachlehrer Jesus Christus</h4>
    <p class="list-group-item-text">Fach: Werkstätte</p>
  </a>
    
</div>
    </div>
    </div>