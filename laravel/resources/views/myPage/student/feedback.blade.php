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
                <li class="active"><a href="{{ action('StudentController@getFeedback') }}">Mein Feedback</a>
                </li>
                <li><a href="{{ action('StudentController@getSettings') }}">Einstellungen</a>
                </li>
                <li><a href="{{ action('StudentController@getNew') }}">Feedback schreiben</a>
                </li>
@stop
<div class="row">
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
    <div class="hidden-xs col-md-3 col-lg-3">
    </div>
    <div class="col-md- col-lg-6">
        <h2>Feedback:</h2>
        @foreach ($feedbacks as $feedback)
                <div class="feedbackbox">
                    <h3>Feedback <small>- {{ $feedback->teacher->name }}</small></h3>
                    <div class="feedback">
                        <h4>{{ $feedback->content }}</h4>   
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
                    <div class="input-group feedbackbox">
                        <form name="feedback" action="{{ action('StudentController@postComment') }}" method="post">
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
