@extends('myPage.masterview')


@section('title')
Student register
@stop

@section('headline')
Student register
@stop

@section('content')
<script src="{{ secure_asset('/js/register/students.js') }}"></script>
<input type="hidden" id="token" value="{{ csrf_token() }}">
@stop
