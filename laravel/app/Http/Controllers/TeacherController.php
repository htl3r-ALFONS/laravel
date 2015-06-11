<?php namespace App\Http\Controllers;

use App\Teacher;
use App\Comment;
use App\Feedback;
use App\Question;
use App\Student;

class TeacherController extends Controller {
    public function getIndex() {
        return view('myPage.teacher.home')->with('teachers', Teacher::all());
    }
    public function getSettings() {
        return view('myPage.teacher.settings');
    }
    public function getFrage() {
        return view('myPage.teacher.questions');
    }
    //ToDo: links auf getQuestions ändern.
    public function getAskFrage() {
        return view('myPage.teacher.newquestion');
    }
    
    
    public function getFeedback() {
        return view('myPage.teacher.feedback', ['students' => Student::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    public function getProfile(){
        return view('myPage.teacher.profile');
    }
    
    public function postComment() {
        $comment = new Comment;
        $feedback->content = Request::get('content');
        $feedback->from = "teacher";
        $feedback->fk_feedback = Request::get('feedback');
    }
    /*public function getIndex() {
        return view('myPage.teacher.home', ['students' => Student::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }*/
    

}