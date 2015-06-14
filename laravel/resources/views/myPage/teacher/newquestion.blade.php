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
    <h1>Stelle eine neue Frage</h1>

    <hr/>
    <!-- todo: Ganze Klassenbezeichnung anzeigen -->
    {!! Form::open(['url' => 'teacher/new']) !!}
        <div class="form-group">
            {!! Form::label('classname','Klasse:') !!}
            {!! Form::select('classname', $classes) !!}
        </div>

        <div class="form-group">
            {!! Form::label('question','Frage:') !!}
            {!! Form::textarea('question', null, ['class' => 'form-control']) !!}
            {!! Form::submit('Frage abschicken', ['class' => 'form-control']); !!}
        </div>
    {!! Form::close() !!}