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

//my routes (lukas)


Route::get('contact', 'MyController@contact');


Route::get('about', 'MyController@about');

Route::get('index', 'MyController@index');
Route::get('login', 'MyController@login');
Route::get('test3', 'MyController@test3');
Route::get('students', 'MyController@students');
Route::get('teachers', 'MyController@teachers');



//Routen für das Absenden eines Feedbacks

Route::get('feedback/create', 'FeedbackController@create');


//my routes end


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
    'login' => 'Login\LoginController'
]);
