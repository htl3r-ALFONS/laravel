<?php namespace App\Http\Controllers;

use App\Teacher;
use App\Comment;
use App\Feedback;
use App\Question;

class MyController extends Controller {	
    
    public function index() {
        return view('myPage.index');
    }
    public function login() {
        return view('myPage.login');
    }
    public function test3() {
        return view('myPage.homemasterview');
    }
    public function students() {
        return view('myPage.studenthome', ['teachers' => Teacher::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    public function teachers() {
        return view('myPage.teacherhome')->with('teachers', Teacher::all());
    }
    public function studentsettings() {
        return view('myPage.studentsettings');
    }
    public function teachersettings() {
        return view('myPage.teachersettings');
    }
    
    public function feedback() {
        return view('myPage.lehrerliste')->with('teachers', Teacher::all());
    }
    public function impressum() {
        return view('myPage.impressum');
    }
    public function neuesfeedback() {
        return view('myPage.newfeedback');
    }
    public function neuefrage() {
        return view('myPage.newquestion');
    }
    
    
    
    

}