<?php namespace App\Http\Controllers;

use App\Teacher;
use App\Comment;
use App\Feedback;
use App\Question;

class StudentController extends Controller {	
    public function students() {
        return view('myPage.studenthome', ['teachers' => Teacher::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    public function settings() {
        return view('myPage.studentsettings');
    }    
    public function feedback() {
        return view('myPage.lehrerliste')->with('teachers', Teacher::all());
    }
}