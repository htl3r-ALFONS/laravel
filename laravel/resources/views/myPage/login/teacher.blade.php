@extends('myPage.masterview')


@section('title')
Teacher login
@stop

@section('content')
<form method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <label>
        E-Mail:
        <input type="email" name="email">
    </label>
    <label>
        Password:
        <input type="password" name="password">
    </label>
    <input type="submit" value="Submit">
</form>
@stop
