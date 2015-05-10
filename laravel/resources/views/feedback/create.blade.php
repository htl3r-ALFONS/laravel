@extends('app')

@section('content')

    <h1>Write a new Feedback</h1>

    <hr/>

    {!! Form::open(['url' => 'feedback']) !!}
        <div class="form-group">
            {!! Form::label('teacher','Lehrer:') !!}
            {!! Form::select('teachersel', ['class' => 'form-control']) !!}
            {!! Form::label('fishname','Username anzeigen') !!}
            {!! Form::checkbox('fishName') !!}
        </div>

        <div class="form-group">
            {!! Form::label('feedback','Feedback:') !!}
            {!! Form::textarea('feedbackText', null, ['class' => 'form-control']) !!}
            {!! Form::submit('Send Feedback', ['class' => 'form-control']); !!}
        </div>
    {!! Form::close() !!}
@stop