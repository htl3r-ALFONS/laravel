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
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
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
                @if($comment->fk_feedback === $feedback->id)
                    @if($comment->from === "teacher")
                        @foreach ($teachers as $teacher)
                            @if ($teacher->id === $feedback->fk_teacher)
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
            <form name="feedback" action="{{ action('StudentController@postComment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="question" value=10000>
                <input type="hidden" name="feedback" value="{{ $feedback->id }}">
                <div class="input-group feedbackbox">
                    <input type="text" name="content" class="form-control" placeholder="kommentieren..."/>
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
                @if($comment->fk_question === $question->id)
                    @if($comment->from === "teacher")
                        @foreach ($teachers as $teacher)
                            @if ($teacher->id === $question->fk_teacher)
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
            <form name="question" action="{{ action('StudentController@postComment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="question" value="{{ $question->id }}">
                <input type="hidden" name="feedback" value=10000>
                <div class="input-group feedbackbox">
                    <input type="text" name="content" class="form-control" placeholder="kommentieren..."/>
                    <span class="input-group-btn">
                        <input type="submit" value="Senden" class="btn btn-default">
                    </span>
                </div>
            </form>
        </div>
        @endforeach
    </div>
    
</div>