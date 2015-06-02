<?php namespace App\Http\Controllers;

use App\Teacher;
use App\Comment;
use App\Feedback;
use App\Question;

class TeacherController extends Controller {
    public function teachers() {
        return view('myPage.teacherhome')->with('teachers', Teacher::all());
    }
    public function settings() {
        return view('myPage.teachersettings');
    }
    public function frage() {
        return view('myPage.newquestion');
    }
    public function feedback(){
        return view('myPage.feedbackteacher');   
    }
    public function profilteacher(){
        return view('myPage.profilteacher');
    }
}