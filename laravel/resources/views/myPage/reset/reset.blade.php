@extends('myPage.masterview')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

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

<form method="post" action="{{ Request::fullUrl() }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="token" value="{{ $token }}">
    
    <input type="email" name="email" value="{{ old('email') }}">
    <input type="password" name="password">
    <input type="password" name="password_confirmation">
    
    <input type="submit" value="Reset password">
</form>