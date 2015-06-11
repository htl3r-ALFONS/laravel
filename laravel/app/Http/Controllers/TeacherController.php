<?php namespace App\Http\Controllers;

use App\Teacher;
use App\Comment;
use App\Feedback;
use App\Question;
use Request;
use App\Student;

class TeacherController extends Controller {
    
    public function __construct() {
        $this->middleware('teacher');
    }
    
    public function getIndex() {
        return view('myPage.teacher.home', ['students' => Student::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    public function getSettings() {
        return view('myPage.teacher.settings');
    }
    public function getFrage() {
        return view('myPage.teacher.newquestion');
    }
    public function getFeedback() {
        return view('myPage.teacher.feedback', ['students' => Student::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    public function getProfile(){
        return view('myPage.teacher.profile');
    }
}