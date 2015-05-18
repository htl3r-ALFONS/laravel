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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

//my routes (lukas)


Route::get('contact', 'MyController@contact');


Route::get('about', 'MyController@about');

Route::get('test', 'MyController@robin');
Route::get('test2', 'MyController@test2');
Route::get('test3', 'MyController@test3');
Route::get('test4', 'MyController@test4');
Route::get('test5', 'MyController@test5');



//Routen für das Absenden eines Feedbacks

Route::get('feedback/create', 'FeedbackController@create');


//my routes end


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
    'login' => 'Login\LoginController'
]);
