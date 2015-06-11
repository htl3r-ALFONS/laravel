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
                <li><a href="{{ action('TeacherController@getProfile')}}">Profil</a>
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
                        {{ $feedback->student->fishname }}</h4>
                    @else
                        Anonym
                    @endif
                    <div class="feedback">
                        <h5>Feedback:</h5>
                        <p>{{ $feedback->content }}</p>    
                    </div>
                    <!-- TODO: Chronologie -->
                    @foreach($comments as $comment)
                        @if($comment->fk_feedback === $feedback->pk_id)
                            @if($comment->from === "teacher")
                                <div class="comment teachercomment">
                                    <p><a href="#"><b>{{ $teacher->name }}:</b></a> {{ $comment->content }}</p>
                                </div>
                            @else
                                <div class="comment">
                                    <p><b>
                                        @if ($feedback->show_fishname) 
                                            {{ $feedback->student->fishname }}</h4>
                                        @else
                                            Anonym
                                        @endif
                                    </b> {{ $comment->content }}</p>
                                </div>
                            @endif
                        @endif
                    @endforeach
                    <!-- ToDo: form testen und verbessern -->
                    {!! Form::open(['url' => 'feedback/new']) !!}
                        <div class="form-group">
                            {!! Form::label('comment','Kommentar:') !!}
                            {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                            {!! Form::submit('Kommentar abschicken', ['class' => 'form-control']); !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            @endforeach
      </div>
</div>