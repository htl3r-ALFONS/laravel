@extends('myPage.homemasterview')
@section('title')
Lehrerauswahl
@stop
@section('fragefb')
Neues Feedback
@stop
@section('active')
                <li><a href="{{ action('StudentController@getIndex') }}">Home</a>
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
        <h2>Feedback:</h2>
        @foreach ($feedbacks as $feedback)
                <div class="feedbackbox">
                    <h4>Feedback an {{ $feedback->teacher->name }}</h4>
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
                                    <p><b>Du:</b> {{ $comment->content }}</p>
                                </div>
                            @endif
                        @endif
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
