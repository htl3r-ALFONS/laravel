@extends('myPage.masterview')


@section('title')
Register
@stop

@section('headline')
Register
@stop

@section('content')

<a href="{{ action('Auth\RegisterController@getStudent') }}">Students</a>
<a href="{{ action('Auth\RegisterController@getTeacher') }}">Teachers</a>

@stop
