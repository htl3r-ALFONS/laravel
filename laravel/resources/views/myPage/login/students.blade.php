@extends('myPage.masterview')


@section('title')
Student login
@stop

@section('headline')
Student login
@stop

@section('content')

@if (Auth::check())
Logged in!
@else
<form method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <label>
        Fishname:
        <input type="text" name="fishname">
    </label>
    <label>
        Password:
        <input type="password" name="password">
    </label>
    <input type="submit" value="Submit">
</form>
@endif
@stop
