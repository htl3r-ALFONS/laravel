@extends('myPage.homemasterview')
@section('title')
Home
@stop
@section('fragefb')
Neue Frage
@stop
@section('active')
<li ><a href="teachers">Home</a>
                </li>
                <li><a href="fragen">Meine Fragen</a>
                </li>
                <li><a href="feedback">Feedback</a>
                </li>
                <li class="active"><a href="#">Profil</a>
                </li>
@stop
<div class="row">
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>
    <div class="col-md-6 col-lg-6">
        <h1>Meine Profil </h1>
        
        <div class="feedbackbox">
            <div>
            <a href="#" class="thumbnail">
                <img class="lehrer" src="http://resizing.flixster.com/A2P0n8pchbLpHcOxVO4_SVqdr9g=/280x250/dkpu1ddg7pbsk.cloudfront.net/rtactor/40/90/40900_ori.jpg" alt="Lehrer">
            </a>
            </div>
            <div class="teacher-aendern-name">
                <span class="teacher-textgroesse-bearbeiten"><b>Prof. Jonah Hill</b></span>
            <button type="button" class=" btn btn-xs">
              <span class="glyphicon glyphicon-pencil"></span>
            </button>
                
            </div>
        </div>
        
    </div>
    
</div>