@extends('myPage.homemasterview')
@section('title')
Home
@stop
@section('fragefb')
Neue Frage
@stop
@section('active')
                <li><a href="/teacher">Home</a>
                </li>
                <li><a href="{{ action('TeacherController@getFrage')}}">Meine Fragen</a>
                </li>
                <li  class="active"><a href="#">Feedback</a>
                </li>
                <li><a href="{{ action('TeacherController@getAskFrage')}}">Frage erstellen</a>
                </li>
                <li><a href="{{ action('TeacherController@getSettings')}}">Einstellungen</a>
                </li>
@stop
<div class="row">
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>
    <div class="col-md-6 col-lg-6">
        <h1>Willkommen! </h1>
    </div>
</div>


<div class="row">
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>
    <div class="col-md-6 col-lg-6">
        <!-- TODO: Chronologie -->
        @foreach ($feedbacks as $feedback)
                <div class="feedbackbox">
                    
                    
                    <h4>Feedback von
                    @if ($feedback->show_fishname) 
                        {{ $feedback->student->fishname }}
                    @else
                        Anonym
                    @endif
                    @if ($feedback->show_classroom) 
                        aus der {{ $feedback->student->classroom->year }}{{ $feedback->student->classroom->letter }}{{ $feedback->student->classroom->branch }}
                    @endif
                        </h4>
                    <div class="feedback">
                        <h4>{{ $feedback->content }}</h4>    
                    </div>
                    <!-- TODO: Chronologie -->
                    @foreach($comments as $comment)
                        @if($comment->fk_feedback === $feedback->id)
                            @if($comment->from === "teacher")
                                <div class="comment teachercomment">
                                    <p><b>{{ $feedback->teacher->name }}:</b> {{ $comment->content }}</p>
                                </div>
                            @else
                                <div class="comment">
                                    <p>
                                        @if ($feedback->show_fishname) 
                                        <b>{{ $feedback->student->fishname }}:</b>
                                        @else
                                        <b>Anonym:</b>
                                        @endif
                                        {{ $comment->content }}
                                    </p>
                                </div>
                            @endif
                        @endif
                    @endforeach
                    <!-- ToDo: form testen -->
                        <div class="form-group">
                            <form name="feedback" action="{{ action('TeacherController@postComment') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="feedback" value="{{ $feedback->id }}">
                                <div class="input-group feedbackbox">
                                    <input type="text" name="content" class="form-control" placeholder="kommentieren..."/>
                                    <span class="input-group-btn">
                                        <input type="submit" value="Senden" class="btn btn-default">
                                    </span>
                                </div>
                            </form>
                        </div>
                </div>
            @endforeach
      </div>
</div>