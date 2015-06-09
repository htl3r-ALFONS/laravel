<?php namespace App\Http\Controllers;

use App\Teacher;
use App\Comment;
use App\Feedback;
use App\Question;
use Request;
use Auth;

class StudentController extends Controller {	
    public function getIndex() {
        return view('myPage.student.home', ['teachers' => Teacher::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    public function getSettings() {
        return view('myPage.student.settings');
    }    
    public function getFeedback() {
        return view('myPage.student.feedback', ['teachers' => Teacher::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    
    public function getNew() {
        return view('feedback.create')
            ->with('teachers', Teacher::lists('name','id'));
    }
    
    public function postNew() {
        $teacher = Teacher::find(Request::get('teacher'));
        
        $feedback = new Feedback;
        $feedback->teacher()->associate($teacher);
        $feedback->show_fishname = Request::get('fishname');
        $feedback->content = Request::get('feedback');
        $feedback->student()->associate(Auth::user()->student);
        $feedback->show_classroom = Request::get('classroom');
        $feedback->save();
        
        return redirect()->action('StudentController@getIndex');
    }
}