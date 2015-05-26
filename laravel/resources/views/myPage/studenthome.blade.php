@extends('myPage.homemasterview')
@section('title')
Home
@stop
@section('fragefb')
Neues Feedback
@stop
@section('active')
<li class="active"><a href="/">Home</a>
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
        <h1>Willkommen! <small>Neue Kommentare & Fragen</small></h1>
        <div class="feedbackbox">
            <a href="#" class="thumbnail">
                <img class="lehrer" src="http://resizing.flixster.com/A2P0n8pchbLpHcOxVO4_SVqdr9g=/280x250/dkpu1ddg7pbsk.cloudfront.net/rtactor/40/90/40900_ori.jpg" alt="Lehrer">
            </a>
            <h2>Feedback:</h2>
            <div class="feedback">
            <h5><b>Blockfisch7:</b></h5>
            <p>Yo Prof ich finde ihr Unterricht könnte etwas mehr musikalische Untermalung vertragen peace</p>    
            </div>
            <div class="comment teachercomment">
                <p><a href="#"><b>Prof. Jonah Hill:</b></a> Euch verdammte Hippies brauch ich im Unterricht nicht!</p>
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
            <a href="#" class="thumbnail">
                <img class="lehrer" src="http://a3.files.biography.com/image/upload/c_fill,cs_srgb,dpr_1.0,g_face,h_300,q_80,w_300/MTIwNjA4NjM0MjA1MzQxMTk2.jpg" alt="Lehrer">
            </a>
            <h2>Frage:</h2>
            <h3>Wie kann ich meinen Unterricht noch verbessern</h3>
        </div>
    </div>
    
</div>