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
                <li><a href="{{ action('TeacherController@getAskFrage')}}">Frage erstellen</a>
                </li>
                <li><a href="{{ action('TeacherController@getProfile')}}">Profil</a>
                </li>
                <li><a href="{{ action('TeacherController@getSettings')}}">Einstellungen</a>
                </li>
@stop
<div class="row">
    <div class="col-md-4 col-lg-4">
        @foreach ($questions as $question)
        <div class="feedbackbox">
            <h3>{{ $question->content }}</h3>
            <!-- Kommentare (Antworten) -->
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