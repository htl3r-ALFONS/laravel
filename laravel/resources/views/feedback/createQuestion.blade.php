@extends('app')

@section('content')

    <h1>Write a new Question</h1>

    <hr/>

    {!! Form::open(['url' => 'question']) !!}
        <div class="form-group">
            {!! Form::label('classes','Klasse:') !!}
            {!! Form::select('classes', $classrooms) !!}
        </div>

        <div class="form-group">
            {!! Form::label('question','Frage:') !!}
            {!! Form::textarea('question', null, ['class' => 'form-control']) !!}
            {!! Form::submit('Frage Senden', ['class' => 'form-control']); !!}
        </div>
    {!! Form::close() !!}
@stop