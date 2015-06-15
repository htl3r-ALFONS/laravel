@extends('myPage.homemasterview')
@section('title')
Lehrerauswahl
@stop
@section('fragefb')
Neues Feedback
@stop
@section('active')
                <li class="active"><li><a href="{{ action('StudentController@getIndex') }}">Home</a>
                </li>
                <li><a href="{{ action('StudentController@getFeedback') }}">Mein Feedback</a>
                </li>
                <li><a href="{{ action('StudentController@getSettings') }}">Einstellungen</a>
                </li>
                <li class="active"><a href="{{ action('StudentController@getNew') }}">Feedback schreiben</a>
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
    <h1>Write a new Feedback</h1>

    <hr/>
    
    <div>
        
    {!! Form::open(['url' => 'student/new']) !!}
        <div class="form-group">
            {!! Form::label('teacher','Lehrer:') !!}
            {!! Form::select('teacher', $teachers) !!}
            {!! Form::label('fishname','Username anzeigen') !!}
            {!! Form::checkbox('fishname') !!}
            {!! Form::label('classroom','Klasse anzeigen') !!}
            {!! Form::checkbox('classroom') !!}
        </div>

        <div class="form-group">
            {!! Form::label('feedback','Feedback:') !!}
            {!! Form::textarea('feedback', null, ['class' => 'form-control']) !!}
            {!! Form::submit('Send Feedback', ['class' => 'form-control']); !!}
        </div>
    {!! Form::close() !!}
        
        
</div>