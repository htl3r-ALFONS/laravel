@extends('app')

@section('content')

    <h1>Write a new Feedback</h1>

    <hr/>

    {!! Form::open(['url' => 'feedback']) !!}
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
@stop