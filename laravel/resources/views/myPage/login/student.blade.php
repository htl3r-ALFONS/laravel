@extends('myPage.masterview')


@section('title')
Student login
@stop

@section('content')
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
@stop
