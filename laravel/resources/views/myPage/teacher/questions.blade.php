@extends('myPage.homemasterview')
@section('title')
Neue Frage
@stop
@section('fragefb')
Neue Frage
@stop
@section('active')
                <li><a href="{{ action('TeacherController@getIndex')}}">Home</a>
                </li>
                <li><a href="#">Meine Fragen</a>
                </li>
                <li><a href="{{ action('TeacherController@getFeedback')}}">Feedback</a>
                </li>
                <li><a href="{{ action('TeacherController@getProfile')}}">Profil</a>
                </li>
                <li><a href="{{ action('TeacherController@getSettings')}}">Einstellungen</a>
                </li>
@stop
<div class="row">
    <div class="hidden-xs col-md-4 col-lg-4">
    
    </div>
    <div class="col-md-4 col-lg-4">
        @foreach ($questions as $question)
        <div class="feedbackbox">
            <h4>{{ $question->content }}</h4>
            <div class="feedback">  
            </div>
            @foreach($feedbacks as $feedback)
            
            
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