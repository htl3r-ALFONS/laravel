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
                <li><a href="studentsettings">Einstellungen</a>
                </li>
@stop
<div class="row">
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>
    <div class="col-md-6 col-lg-6">
        <h1>Willkommen! <small>Neue Kommentare & Fragen</small></h1>
        @foreach ($feedbacks as $feedback)
        <div class="feedbackbox">
            <a href="#" class="thumbnail">
                <img class="lehrer" src="http://resizing.flixster.com/A2P0n8pchbLpHcOxVO4_SVqdr9g=/280x250/dkpu1ddg7pbsk.cloudfront.net/rtactor/40/90/40900_ori.jpg" alt="Lehrer">
            </a>
            <h2>Feedback:</h2>
            <div class="feedback">
            <h5><b>Du:</b></h5>
            <p>{{ $feedback->content }}</p>    
            </div>
            @foreach($comments as $comment)
                @if($comment->fk_feedback === $feedback->pk_id)
                    @if($comment->from === "teacher")
                        @foreach ($teachers as $teacher)
                            @if ($teacher->pk_id === $feedback->fk_teacher)
                                <div class="comment teachercomment">
                                    <p><a href="#"><b>{{ $teacher->name }}:</b></a> {{ $comment->content }}</p>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="comment">
                            <p><a href="#"><b>Du:</b></a> {{ $comment->content }}</p>
                        </div>
                    @endif
                @endif
            @stopforeach
            <div class="input-group feedbackbox">
                <input type="text" class="form-control" placeholder="kommentieren...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Senden</button>
                </span>
            </div>
        </div>
        @stopforeach
        @foreach ($questions as $question)
        <div class="frage">
            <a href="#" class="thumbnail">
                <img class="lehrer" src="http://a3.files.biography.com/image/upload/c_fill,cs_srgb,dpr_1.0,g_face,h_300,q_80,w_300/MTIwNjA4NjM0MjA1MzQxMTk2.jpg" alt="Lehrer">
            </a>
            @foreach ($teachers as $teacher)
            <h3>{{ $question->content }}<small> - {{ $teacher->name }}</small></h3>
            @foreach($comments as $comment)
                @if($comment->fk_feedback === $feedback->pk_id)
                    @if($comment->from === "teacher")
                        @foreach ($teachers as $teacher)
                            @if ($teacher->pk_id === $feedback->fk_teacher)
                                <div class="comment teachercomment">
                                    <p><a href="#"><b>{{ $teacher->name }}:</b></a> {{ $comment->content }}</p>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="comment">
                            <p><a href="#"><b>Du:</b></a> {{ $comment->content }}</p>
                        </div>
                    @endif
                @endif
            @stopforeach
            @stopforeach
            <div class="input-group feedbackbox">
                <input type="text" class="form-control" placeholder="kommentieren...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Senden</button>
                </span>
            </div>
        </div>
        @stopforeach
    </div>
    
</div>