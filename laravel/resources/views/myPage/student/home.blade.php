@extends('myPage.homemasterview')
@section('title')
Home
@stop
@section('fragefb')
Neues Feedback
@stop
@section('active')
<li class="active"><a href="#">Home</a>
                </li>
                <li><a href="{{ action('StudentController@getFeedback') }}">Mein Feedback</a>
                </li>
                <li><a href="{{ action('StudentController@getSettings') }}">Einstellungen</a>
                </li>
                <li><a href="{{ action('StudentController@getNew') }}">Feedback schreiben</a>
                </li>
@stop
<div class="row">
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>
    <div class="col-md-6 col-lg-6">
        <h1>Willkommen! <small>Neue Kommentare & Fragen</small></h1>
        @foreach ($feedbacks as $feedback)
        <div class="feedbackbox">
            <h2>Feedback:</h2>
            <div class="feedback">
            <h5><b>Du:</b></h5>
            <p>{{ $feedback->content }}</p>    
            </div>
            @foreach($comments as $comment)
            <form action="{{ action('StudentController@postComment') }}">
                <input type="hidden" name="feedback" value="{{ $feedback->pk_id }}">
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
                            <p><b>Du:</b> {{ $comment->content }}</p>
                        </div>
                    @endif
                @endif
            @endforeach
            <div class="input-group feedbackbox">
                <input type="text" name="content" class="form-control" placeholder="kommentieren...">
                <span class="input-group-btn">
                    <input type="submit" value="Senden" class="btn btn-default">
                </span>
                </div>
            </form>
        </div>
        @endforeach
        @foreach ($questions as $question)
        <div class="frage">
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
            @endforeach
            @endforeach
            <div class="input-group feedbackbox">
                <input type="text" class="form-control" placeholder="kommentieren...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Senden</button>
                </span>
            </div>
        </div>
        @endforeach
    </div>
    
</div>