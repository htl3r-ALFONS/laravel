@extends('myPage.masterview')


@section('title')
Teacher register
@stop

@section('headline')
Teacher register
@stop

@section('content')
<script src="{{ secure_asset('/js/register/teacher.js') }}"></script>
<input type="hidden" id="token" value="{{ csrf_token() }}">
@stop
