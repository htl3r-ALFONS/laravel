@extends('myPage.homemasterview')
@section('title')
Home
@stop
@section('fragefb')
Neue Frage
@stop
@section('active')
<li class="active"><a href="{{ action('TeacherController@getIndex')}}">Home</a>
                </li>
                <li><a href="{{ action('TeacherController@getFrage')}}">Meine Fragen</a>
                </li>
                <li><a href="{{ action('TeacherController@getFeedback')}}">Feedback</a>
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
        
        <h2>Feedbacks</h2>
        <div class="feedbackbox">
            <div class="col-md-6 col-lg-6">
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
                    @foreach($comments as $comment)
                    @if($comment->fk_feedback === $feedback->id)
                    @if($comment->from === "teacher")
                    <div class="comment teachercomment">
                        <p>{{ $feedback->teacher->name }}:{{ $comment->content }}</p>
                    </div>
                    @else
                    <div class="comment">
                        @if ($feedback->show_fishname) 
                        {{ $feedback->student->fishname }}:
                        @else
                        Anonym:
                        @endif
                        <p>{{ $comment->content }}</p>
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
        
        <h2>Fragen</h2>
        <div class="frage">
            <div class="col-md-4 col-lg-4">
                @foreach ($questions as $question)
                <div class="feedbackbox">
                    <h3>{{ $question->content }}</h3>
                    <h4>Antworten:</h4>
                    @foreach ($comments as $comment)
                        @if($comment->fk_question === $question->id)
                        <div class="comment">
                            <div class="comment studentcomment">
                                Anonym:<p>{{ $comment->content }}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endforeach



                </div>
            </div>
        </div>
        
    </div>
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>    
</div>