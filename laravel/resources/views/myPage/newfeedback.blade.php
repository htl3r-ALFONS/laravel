@extends('myPage.homemasterview')
@section('title')
Neues Feedback
@stop
@section('fragefb')
Neues Feedback
@stop
@section('active')
                <li><a href="students">Home</a>
                </li>
                <li><a href="feedback">Mein Feedback</a>
                </li>
                <li><a href="settings">Einstellungen</a>
                </li>
@stop
<div class="row">
    <div class="hidden-xs col-md-4 col-lg-4">
    </div>
    <div class="col-md-4 col-lg-4">
        <div class="fenster">
                <h4><small>An:</small> Prof. Jonah Hill</h4>
            <p>
            Feedback:<br>
            <input type="text" />
            </p>
            <p>
           Beschreibung:<br>
           <textarea rows="6" placeholder=" ...optional"></textarea>
           </p>
            <p style="text-align:right;">
                <button class="btn btn-default">
                    Absenden
                </button>
            </p>
        </div>
    </div>
</div>