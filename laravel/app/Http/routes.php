<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MyController@index');

Route::get('home', 'HomeController@index');


Route::get('contact', 'MyController@contact');


Route::get('about', 'MyController@about');

Route::get('index', 'MyController@index');
Route::get('login', 'MyController@login');
Route::get('impressum', 'MyController@impressum');
Route::get('richtlinien', 'MyController@richtlinien');


//Routen für das Absenden eines Feedbacks

Route::get('feedback/create', 'FeedbackController@create');
Route::post('feedback', 'FeedbackController@store');

//Routen zum absenden einer Frage

Route::get('question/create', 'QuestionController@create');
Route::post('question', 'QuestionController@store');

//my routes end


Route::controllers([
    'login' => 'Auth\LoginController',
    'logout' => 'Auth\LogoutController',
    'register' => 'Auth\RegisterController',
    'password' => 'Auth\PasswordController',
    'teacher' => 'TeacherController',
    'student' => 'StudentController'
]);
